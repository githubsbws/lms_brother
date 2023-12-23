<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    // Detail
    function courseDetail($id)
    {
        $course_detail = Course::findById($id);
        $course_lesson = Lesson::findBycourseId($id);
        if ($course_lesson != null) {
            return view("course/course-detail", ['course_detail' => $course_detail], ['course_lesson' => $course_lesson]);
        } else {
            return redirect()->route('index');
        }
        //    dd($course_detail);
    }

    // Lession
    function courseLesson($course_id, $id, Request $request)
    {
        $course_detail = Course::paginate(3);
        $lesson_list = Lesson::where(['course_id' => $course_id, 'active' => 'y'])->get();
        if (isset($id)) {
            $course_lesson = Lesson::join('course_online', 'course_online.course_id', '=', 'lesson.course_id')->where('lesson.id', $id)->get();
        }
        return view("course/course-lesson", ['course_lesson' => $course_lesson, 'course_detail' => $course_detail, 'lesson_list' => $lesson_list]);
    }

    // course
    function course()
    {
        $course_detail = Course::join('category', 'category.cate_id', '=', 'course_online.cate_id')->where('course_online.active', 'y')->orderBy('course_id', 'desc')->paginate(6);
        return view("course/course", ['course_detail' => $course_detail]);
    }

    // course create
    function courseonlinecreate()
    {
        $category = DB::table('category')->pluck('cate_title', 'cate_id');
        return view("admin\courseonline\courseonline-create", compact('category'));
    }

    // course create to 
    function courseonlinecreateto(Request $request)
    {
        // img
        $uploadedFile = $request->file('CourseOnline.course_picture');
        $extension = $uploadedFile->getClientOriginalExtension();
        $filename = now()->format('Ymd') . rand(10000, 99999) . '_Picture.' . $extension;
        $uploadedFile->storeAs('public/images/uploads/', $filename);
        // ข้อมูล
        $data = [
            'cate_id' => $request->input('CourseOnline.cate_id'),
            'course_lecturer' => $request->input('CourseOnline.course_lecturer'),
            'course_title' => $request->input('CourseOnline.course_title'),
            'course_short_title' => $request->input('CourseOnline.course_short_title'),
            'course_detail' => $request->input('CourseOnline.course_detail'),
            'recommend' => $request->input('CourseOnline.recommend'),
            'course_note' => $request->input('CourseOnline.course_note'),
            'course_picture' => $filename,
        ];
        // บันทึก
        DB::table('course_online')->insert($data);
        $redirectUrl = route('courseonline');
        return redirect($redirectUrl);
    }

    // course edit
    function courseonlineedit(Request $request, $id)
    {
        $course_detail = DB::table('course_online')->where('course_id', $id)->first();
        $category = DB::table('category')->pluck('cate_title', 'cate_id');
        return view("admin\courseonline\courseonline-edit", compact('course_detail', 'category'));
    }

    // course edit to 
    function courseonlineeditto(Request $request, $id)
    {
        // img
        $filename = DB::table('course_online')->where('course_id', $id)->value('course_picture');
        $uploadedFile = $request->file('CourseOnline.course_picture');
        if ($uploadedFile) {
            $extension = $uploadedFile->getClientOriginalExtension();
            // ตั้งชื่อไฟล์
            $filename = now()->format('Ymd') . rand(10000, 99999) . '_Picture.' . $extension;
            // บันทึกไฟล์
            $uploadedFile->storeAs('public/images/uploads/', $filename);
            // อัปเดตไฟล์ลงฐานข้อมูล
            DB::table('course_online')->where('course_id', $id)->update([
                'course_picture' => $filename,
            ]);
        }
        // ข้อมูล
        $data = [
            'cate_id' => $request->input('CourseOnline.cate_id'),
            'course_lecturer' => $request->input('CourseOnline.course_lecturer'),
            'course_title' => $request->input('CourseOnline.course_title'),
            'course_short_title' => $request->input('CourseOnline.course_short_title'),
            'course_detail' => $request->input('CourseOnline.course_detail'),
            'recommend' => $request->input('CourseOnline.recommend'),
            'course_note' => $request->input('CourseOnline.course_note'),
            'course_picture' => $filename,
            'update_date' => now(),
        ];
        // บันทึก
        DB::table('course_online')->where('course_id', $id)->update($data);
        $redirectUrl = route('courseonline');
        return redirect($redirectUrl);
    }

    // course change to id
    function courseonlinechange($id)
    {
        $course_detail = DB::table('course_online')->where('course_id', $id)->first();
        // ตรวจสอบค่าปัจจุบันของ 'active' และกำหนดค่าใหม่
        $newActive = ($course_detail->active == 'y') ? 'n' : 'y';
        $data = [
            'active' => $newActive,
        ];
        DB::table('course_online')->where('course_id', $id)->update($data);
        $redirectUrl = route('courseonline');
        return redirect($redirectUrl);
    }

    // course det show
    function courseonlinedet(Request $request, $id)
    {
     
    }
}
