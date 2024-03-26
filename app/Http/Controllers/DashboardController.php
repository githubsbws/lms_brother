<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Orgchart;
use App\Models\Orgcourse;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    function dashboard(){
        $minutes = 3;

        $course = Cache::remember('course', $minutes, function () {
            if(Auth::user()->department_id != null &&Auth::user()->department_id != 1){
                $org_chart_ids = Orgchart::where('id',Auth::user()->department_id)->where('active', 'y')->pluck('id');
            }elseif(Auth::user()->department_id == 1){
                $org_chart_ids = Orgchart::where('active', 'y')->pluck('id');
            }
            else{
                $org_chart_ids = Orgchart::where('id','0')->where('active', 'y')->pluck('id');   
            }

            $orgcourse = Orgcourse::whereIn('orgchart_id', $org_chart_ids)->where('active', 'y')->pluck('course_id');
            return Course::where('active','y')->whereIn('course_id',$orgcourse)->orderBy('course_id','DESC')->get();
        });
        if(Auth::check()){
            return view('dashboard.dashboard',['course' => $course]);
        }
        return view('auth.login');
    }
}
