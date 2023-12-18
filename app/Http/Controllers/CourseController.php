<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    // Detail
    function courseDetail(Request $request)
    {
        $course_id = $request->query('id');
        $course_detail = DB::table('course_online')->where('course_id', $course_id)->first();
    //    dd($course_detail);
        return view("course/course-detail", compact('course_detail'));
    }

    // Lession
    function courseLesson(){
        return view("course\course-lesson");
    }
    
    // course
    function course()
    {
        $course_detail = DB::table('course_online')
        ->join('category', 'course_online.cate_id', '=', 'category.cate_id')
        ->select('course_online.*', 'category.cate_title')
        ->get();
        return view("course\course",compact('course_detail'));
    }
}
