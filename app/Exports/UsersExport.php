<?php

namespace App\Exports;

use App\Models\Company;
use App\Models\Score;
use App\Models\Learn;
use App\Models\Users;
use App\Models\Setting;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    protected $courseId;
    protected $users;
    protected $lessons;

    public function __construct($courseId, $users, $lessons)
    {
        $this->courseId = $courseId;
        $this->users = $users;
        $this->lessons = $lessons;
    }

    public function collection()
    {
        // Return users collection
        return $this->users;
    }

    public function headings(): array
    {
        $lessonHeaders = $this->lessons->map(function($lesson) {
            return $lesson->title;
        })->toArray();

        return [
            'Username',
            'Name',
            'User group',
            'Organization Name',
            'PRE Date',
            'PRE Score',
            'PRE Total',
            ...$lessonHeaders,
            'POST Date',
            'POST Score',
            'POST Total',
            'Pass',
            'Last Score'
        ];
    }

    public function map($user): array
    {
        $company = Company::find($user->company_id);
        $scorePre = Score::where('user_id', $user->id)
                        ->where('course_id', $this->courseId)
                        ->where('type', 'pre')
                        ->where('active', 'y')
                        ->orderBy('score_number', 'DESC')
                        ->first();
        $scorePost = Score::where('user_id', $user->id)
                        ->where('course_id', $this->courseId)
                        ->where('type', 'post')
                        ->where('active', 'y')
                        ->orderBy('score_number', 'DESC')
                        ->first();
        $score = Score::where('user_id', $user->id)
                         ->where('course_id', $this->courseId)
                         ->latest('score_id')->first();

        $preDate = $scorePre ? $scorePre->create_date : '';
        $preScore = $scorePre ? $scorePre->score_number : '';
        $preTotal = $scorePre ? $scorePre->score_total : '';

        $postDate = $scorePost ? $scorePost->create_date : '';
        $postScore = $scorePost ? $scorePost->score_number : '';
        $postTotal = $scorePost ? $scorePost->score_total : '';

        // setting %
        $setting = Setting::first();
        $passScore = (int) ($setting->settings_score ?? 50);

        // จำนวน lesson ทั้งหมด
        $totalLessons = $this->lessons->count();

        // lesson ที่เรียนจบ
        $completedLessons = Learn::whereIn('lesson_id', $this->lessons->pluck('id'))
            ->where('user_id', $user->id)
            ->where('lesson_status', 'pass')
            ->count();

        // คะแนน post
        $scoreNumber = (int) ($scorePost->score_number ?? 0);
        $scoreTotal = (int) ($scorePost->score_total ?? 0);

        // คิด %
        $scorePercent = 0;

        if ($scoreTotal > 0) {
            $scorePercent = ($scoreNumber / $scoreTotal) * 100;
        }

        // เช็คเงื่อนไข
        $learnCompleted = $completedLessons >= $totalLessons;
        $scorePassed = $scorePercent >= $passScore;

        // pass/fail
        if ($learnCompleted && $scorePassed) {
            $pass = 'Pass';
        } elseif (!$learnCompleted) {
            $pass = 'Incomplete Lesson';
        } else {
            $pass = 'Not Pass';
        }

        $lastScore = $score
                    ? $score->score_number . ' (' . round($scorePercent, 2) . '%)'
                    : '';

        $lessonData = $this->lessons->map(function($lesson) use ($user) {
            $learn = Learn::where('lesson_id', $lesson->id)
                          ->where('user_id', $user->id)
                          ->first();
            return $learn ? $learn->learn_date : '';
        })->toArray();

        return [
            $user->username,
            $user->firstname . ' ' . $user->lastname,
            $company ? $company->company_title : '-',
            '-',
            $preDate,
            $preScore,
            $preTotal,
            ...$lessonData,
            $postDate,
            $postScore,
            $postTotal,
            $pass,
            $lastScore
        ];
    }
}
