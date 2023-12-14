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
    function courseDetail(){
        return view("course\course-detail");
    }
    // Lession
    function courseLession(){
        return view("course\course-lesson");
    }
    // course
    function course(){
        return view("course\course");
    }
}
