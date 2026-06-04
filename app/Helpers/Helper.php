<?php

namespace App\Helpers;

use App\Models\File;
use App\Models\LearnFile;
use App\Models\Score;

class Helper
{
    public static function lessonCompleted($lessonId, $userId, $courseId)
    {
        $hasVideo = File::where('lesson_id', $lessonId)
            ->where('active', 'y')
            ->exists();

        if ($hasVideo) {

            return LearnFile::where('user_id_file', $userId)
                ->whereHas('file', function ($q) use ($lessonId) {
                    $q->where('lesson_id', $lessonId);
                })
                ->where('learn_file_status', 's')
                ->exists();
        }

        // ไม่มีวิดีโอ => เช็ค Post Test
        return Score::where([
            'lesson_id' => $lessonId,
            'user_id' => $userId,
            'course_id' => $courseId,
            'active' => 'y'
        ])->exists();
    }
}