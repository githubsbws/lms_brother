<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LessonController extends Controller
{
    // lession create
    function lessioncreate()
    {
        $course_online = Course::join('category', 'category.cate_id', '=', 'course_online.cate_id')->where('course_online.active', 'y')->orderBy('course_id', 'desc')->get();
        return view("admin\lesson\lesson-create", compact('course_online'));
    }
    // lession  create to
    function lessioncreateto(Request $request)
    {
        // img
        $uploadedFile = $request->file('Lesson.image');
        $extension = $uploadedFile->getClientOriginalExtension();
        $filename = now()->format('Ymd') . rand(10000, 99999) . '_Picture.' . $extension;
        $uploadedFile->storeAs('public/images/uploads/lesson/', $filename);
        // ข้อมูล
        $data = [
            'course_id' => $request->input('Lesson.course_id'),
            'title' => $request->input('Lesson.title'),
            'description' => $request->input('Lesson.description'),
            'view_all' => $request->input('Lesson.view_all'),
            'cate_amount' => $request->input('Lesson.cate_amount'),
            'time_test' => $request->input('Lesson.time_test'),
            'content' => $request->input('Lesson.content'),
            'image' => $filename,
        ];
        DB::table('lesson')->insert($data);
        $redirectUrl = route('lesson');
        return redirect($redirectUrl);
    }

    // lession edit
    function lessionedit(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        $course_online = Course::join('category', 'category.cate_id', '=', 'course_online.cate_id')
            ->where('course_online.active', 'y')
            ->orderBy('course_id', 'desc')
            ->select('course_title', 'course_id', 'cate_title')
            ->get();
        $selectedCourseId = $lesson->course_id;
        return view("admin\lesson\lesson-edit", compact('lesson', 'course_online', 'selectedCourseId'));
    }

    // lession edit to
    function lessioneditto(Request $request, $id)
    {
        // img
        $filename = DB::table('lesson')->where('id', $id)->value('image');
        $uploadedFile = $request->file('Lesson.image');
        if ($uploadedFile) {
            $extension = $uploadedFile->getClientOriginalExtension();
            // ตั้งชื่อไฟล์
            $filename = now()->format('Ymd') . rand(10000, 99999) . '_Picture.' . $extension;
            // บันทึกไฟล์
            $uploadedFile->storeAs('public/images/uploads/lesson/', $filename);
            // อัปเดตไฟล์ลงฐานข้อมูล
            DB::table('lesson')->where('id', $id)->update([
                'image' => $filename,
            ]);
        }
        // ข้อมูล
        $data = [
            'course_id' => $request->input('Lesson.course_id'),
            'title' => $request->input('Lesson.title'),
            'description' => $request->input('Lesson.description'),
            'view_all' => $request->input('Lesson.view_all'),
            'cate_amount' => $request->input('Lesson.cate_amount'),
            'time_test' => $request->input('Lesson.time_test'),
            'content' => $request->input('Lesson.content'),
            'image' => $filename,
            'update_date' => now(),
        ];
        // บันทึก
        DB::table('lesson')->where('id', $id)->update($data);
        $redirectUrl = route('lesson');
        return redirect($redirectUrl);
    }
    // lession change to id
    function lessionchange($id)
    {
        $lesson = DB::table('lesson')->where('id', $id)->first();
        // dd($id);
        // ตรวจสอบค่าปัจจุบันของ 'active' และกำหนดค่าใหม่
        $newActive = ($lesson->active == 'y') ? 'n' : 'y';
        $data = [
            'active' => $newActive,
        ];
        DB::table('lesson')->where('id', $id)->update($data);
        $redirectUrl = route('lesson');
        return redirect($redirectUrl);
    }

    // lession det show
    function lessiondet(Request $request, $id)
    {
     
    }
}
