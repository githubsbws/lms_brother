<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class AdminController extends Controller
{
    function aboutus(){
        return view("admin\aboutus\aboutus");
    }
    function condition(){
        return view("admin\condition\condition");
    }
    function setting(){
        return view("admin\setting\setting");
    }
    function contactus(){
        return view("admin\contactus\contactus");
    }
    function video(){
        return view("admin\video\video");
    }
    function document(){
        return view("admin\document\document");
    }
    function news(){
        return view("admin\news\news");
    }
    function category(){
        return view("admin\category\category");
    }
    function courseonline(){
        return view("admin\courseonline\courseonline");
    }
    function lesson(){
        return view("admin\lesson\lesson");
    }
    function grouptesting(){
        return view("admin\grouptesting\grouptesting");
    }
    function coursegrouptesting(){
        return view("admin\coursegrouptesting\coursegrouptesting");
    }
    function questionnaireout(){
        return view("admin\questionnaireout\questionnaireout");
    }
    function orgchart(){
        return view("admin\orgchart\orgchart");
    }
    function checklecture(){
        return view("admin\checklecture\checklecture");
    }
    function coursecheck(){
        return view("admin\checklecture\checklecture-coursecheck");
    }
    function certificate(){
        return view("admin\certificate\certificate");
    }
    function signnature(){
        return view("admin\signnature\signnature");
    }
    function captcha(){
        return view("admin\captcha\captcha");
    }
    function usability(){
        return view("admin\usability\usability");
    }
    function reportproblem(){
        return view("admin\reportproblem\reportproblem");
    }
    function faqtype(){
        return view("admin\Faq\Faqtype");
    }
    function faq(){
        return view("admin\Faq\Faq");
    }
    function adminuser(){
        return view("admin\adminuser\adminuser");
    }
    function pgroup(){
        return view("admin\pgroup\pgroup");
    }
    function user_admin(){
        return view("admin\user_admin\user-admin");
    }
    function coursefield(){
        return view("admin\coursefield\coursefield");
    }
    function imgslide(){
        return view("admin\imgslide\imgslide");
    }
    function librarytype(){
        return view("admin\libraryfile\librarytype");
    }
    function libraryfile(){
        return view("admin\libraryfile\libraryfile");
    }
    function coursenotification(){
        return view("admin\coursenotification\coursenotification");
    }
    function passcourse(){
        return view("admin\passcourse\passcourse");
    }
    function logadmin(){
        return view("admin\logadmin\logadmin");
    }
    function student_photo(){
        return view("admin\student-photo\student-photo");
    }
    function capture(){
        return view("admin\capture\capture");
    }
    //----- หน้ารายชื่อธนาคาร
    public function index()
{
    if(auth()->user()) {
        return view('admin/index/index');
    } else {
        return view('admin/login/login');
    }
}
    function bank(Request $request)
    {
        //dd($request->id);
        if ($request->id == null) {
            return back();
        }
        $banks = DB::table('bank')->paginate(3);
        $ascs = DB::table('asc')->pluck('name', 'id');
        $vedios = DB::table('showvdo')
            ->join('asc', 'showvdo.showvdo_username', '=', 'asc.id')
            ->join('vedio', 'showvdo.showvdo_vdo', '=', 'vedio.id')
            ->select('showvdo.*', 'asc.name', 'vedio.vedio_name')
            ->get();
        $users = DB::table('users')
            ->join('asc', 'users.asc_id', '=', 'asc.id')
            ->select('users.*', 'asc.name')
            ->get();
        $url = url('bank', ['id' => $request->id]);
        return view('bank', compact('banks', 'ascs', 'url', 'users', 'vedios'));
    }

    //----- Popup หน้าเพิ่มข้อมูล
    function insertt()
    {
        return view('bank');
    }

    //----- popup User
    function user(Request $request)
    {
        return view('bank');
    }
    
    //----- ลบ VDO
    function del(Request $request, $id)
    {
        $del = DB::table('showvdo')->where('id', $id)->first();
        if (!$del) {
            return redirect()->back()->with('error', 'ไม่พบข้อมูลที่ต้องการลบ');
        }
        DB::table('showvdo')->where('id', $id)->delete();
        $redirectUrl = route('bank', ['id' => $request->id]);
        return redirect($redirectUrl)->with('success', 'ลบข้อมูลสำเร็จ');
    }
}
