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
        if($course_lesson != null){
            return view("course/course-detail",['course_detail' =>$course_detail],['course_lesson' =>$course_lesson]);  
        }else{
            return redirect()->route('index');
        }
    //    dd($course_detail);
    }

    // Lession
    function courseLesson($course_id,$id, Request $request){
        $course_detail = Course::paginate(3);
        $lesson_list = Lesson::where(['course_id' => $course_id,'active' =>'y'])->get();
        if(isset($id)){
            $course_lesson = Lesson::join('course_online','course_online.course_id','=','lesson.course_id')->where('lesson.id',$id)->get();
        }
        return view("course/course-lesson",['course_lesson' =>$course_lesson,'course_detail' =>$course_detail,'lesson_list' =>$lesson_list]);
    }
    
    // course
    function course()
    {
        $course_detail = Course::join('category','category.cate_id','=','course_online.cate_id')->where('course_online.active','y')->orderBy('course_id', 'desc')->paginate(6);
        return view("course/course",['course_detail' =>$course_detail]);
    }
}
