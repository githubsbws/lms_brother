<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use DateTime;
// use Intervention\Image\Facades\Image;
use App\Models\Questionnaireout;
use Carbon\Carbon;
use App\Models\Image;


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
        $contactus= DB::table('contactus')->get();

        return view("admin\Contactus\Contactus",compact('contactus'));
    }
    function contactus_create(){
        $contactus_create= DB::table('contactus')->get();
        return view("admin\Contactus\Contactus_create",compact('contactus_create'));
    }
    function contactus_insert(Request $request){
        $request->validate([
            'contac_by_name'=>'required',
            'contac_by_surname'=>'required',
            'contac_by_email'=>'required|email',
            'contac_by_tel'=>'required|numeric',
            'contac_subject'=>'required',
            'contac_detail'=>'required',
            'contac_ans_subject'=>'required',
            'contac_ans_detail'=>'required',

        ]);
        $date=new DateTime('Asia/Bangkok'); 
        $contact_data=[
            'contac_by_name'=>$request->contac_by_name,
            'contac_by_surname'=>$request->contac_by_surname,
            'contac_by_email'=>$request->contac_by_email,
            'contac_by_tel'=>$request->contac_by_tel,
            'contac_subject'=>$request->contac_subject,
            'contac_detail'=>$request->contac_detail,
            'contac_ans_subject'=>$request->contac_ans_subject,
            'contac_ans_detail'=>$request->contac_ans_detail,
            'contac_answer'=>'y',
            'create_date'=>$date,
            'create_by'=>'1',
            'update_date'=>$date,
            'update_by'=>'1',
            'active'=>'y',
        ];
        DB::table('contactus')->insert($contact_data);
        return redirect('/contactus');
    }
    function contactus_edit_page($id){
        $contactus_edit_page= DB::table('contactus')
        ->where('contac_id',$id)
        ->first();
        // dd($contactus_edit_page);
        return view("admin\Contactus\Contactus_edit_page",compact('contactus_edit_page'));
    }
    function contactus_edit(Request $request,$id){
        $request->validate([
            'contac_by_name'=>'required',
            'contac_by_surname'=>'required',
            'contac_by_email'=>'required|email',
            'contac_by_tel'=>'required|numeric',
            'contac_subject'=>'required',
            'contac_detail'=>'required',
            'contac_ans_subject'=>'required',
            'contac_ans_detail'=>'required',
        ]);
        $date=new DateTime('Asia/Bangkok'); 
        $contactus_edit  =[
            'contac_by_name'=>$request->contac_by_name,
            'contac_by_surname'=>$request->contac_by_surname,
            'contac_by_email'=>$request->contac_by_email,
            'contac_by_tel'=>$request->contac_by_tel,
            'contac_subject'=>$request->contac_subject,
            'contac_detail'=>$request->contac_detail,
            'contac_ans_subject'=>$request->contac_ans_subject,
            'contac_ans_detail'=>$request->contac_ans_detail,
            'update_date'=>$date,
            'update_by'=>'1'
        ]; 
        DB::table('contactus')->where('contac_id',$id)->update($contactus_edit);
        return redirect("/contactus");
    }
    function contactus_delete($id){
 
        $contactus_delete=[ 
            'active'=>'n',
        ];
        DB::table('contactus')->where('contac_id',$id)->update($contactus_delete);
        return redirect("/contactus");
    }
    // new p
    function video_create(){
        return view("admin\Video\Video-create");
    }
    function video(){
        $vdo =DB::table('vdo')->get();
        return view("admin\Video\Video",compact('vdo'));
    }
    function video_insert(Request $request){
        $request->validate([
            'vdo_title'=>'required|max:115',
            'vdo_path' => 'required|url|max:255',
        ]);
        $date=new DateTime('Asia/Bangkok');
        $vdo_data=[
            'vdo_title'=>$request->vdo_title,
            'vdo_path'=>$request->vdo_path,
            'create_date'=>$date,
            'create_by'=>'1',               //default
            'update_date'=>$date,
            'update_by'=>'1',               //default
            'active'=>'y'                   //default
        ];
        DB::table('vdo')->insert($vdo_data);
        return redirect()->route('video');
    }
    function video_edit($vdo_id){
        $vdo =DB::table('vdo')->where('vdo_id',$vdo_id)->first();
        return view("admin\Video\Video-edit",compact('vdo'));
    }
    function video_update(Request $request,$vdo_id){
        $request->validate([
            'vdo_title'=>'required|max:115',
            'vdo_path' => 'required|url|max:255',
        ]);
        $date=new DateTime('Asia/Bangkok');
        $vdo_data=[
            'vdo_title'=>$request->vdo_title,
            'vdo_path'=>$request->vdo_path,
            'create_date'=>$date,
            'create_by'=>'1',               //default
            'update_date'=>$date,
            'update_by'=>'1',               //default
            'active'=>'y'                   //default
        ];
        DB::table('vdo')->where('vdo_id',$vdo_id)->update($vdo_data);
        return redirect()->route('video');
    }
    function video_delete($vdo_id){
        $vdo_delete=[
            'active'=>'n'
        ];
        DB::table('vdo')->where('vdo_id',$vdo_id)->update($vdo_delete);
        return redirect()->route('video');
    }
    //
    function document(){
        return view("admin\document\document");
    }
    //new p
    function news_create(){
        return view("admin\News\News-create");
    }
    function news(){
        return view("admin\News\News");
    }   
    function category(){
        $category_on = DB::table('category')->where('category.active', 'y')->orderBy('cate_id', 'desc')->get();
        return view("admin\category\category",compact('category_on'));
    }
    function courseonline(){
        $course_online = Course::join('category', 'category.cate_id', '=', 'course_online.cate_id')->where('course_online.active', 'y')->orderBy('course_id', 'desc')->get();
        return view("admin\courseonline\courseonline", compact('course_online'));
    }
    function lesson(){
        $course_online = Course::where('course_online.active', 'y')->orderBy('course_id', 'desc')->get();
        $lesson = Lesson::join('course_online','course_online.course_id','=','lesson.course_id')->where('lesson.active', 'y')->get();
        return view("admin\lesson\lesson",compact('course_online','lesson'));
    }

    //new p
    function grouptesting_create(){
        return view("admin\grouptesting\grouptesting-create");
    }
    function grouptesting(){
        return view("admin\grouptesting\grouptesting");
    }
    //

    //new p
    function coursegrouptesting_create(){
        return view("admin\coursegrouptesting\coursegrouptesting-create");
    }
    function coursegrouptesting(){
        return view("admin\coursegrouptesting\coursegrouptesting");
    }
    //

    //new p
    function questionnaireout(){
        $survey_headers = Questionnaireout::get();
        return view("admin\questionnaireout\questionnaireout",compact('survey_headers'));
    }
    function questionnaireout_create(){
        return view("admin\questionnaireout\questionnaireout-create");
    }
    function questionnaireout_insert(Request $request){
        $request->validate([
            'survey_name' => 'required|max:73',
            'instructions' => 'required|max:752',
        ]);
        $survey_header_data=[
            'survey_name'=>$request->survey_name,
            'instructions'=>$request->instructions,
            'instructions_en'=>'',
            'other_header_info'=>'',               //default
            'type'=>'',
            'active'=>'y'                   //default
        ];
        $survey = new Questionnaireout;
        $survey->fill($survey_header_data);
        $survey->save();
        return redirect()->route('questionnaireout');
    }
    function questionnaireout_edit($survey_header_id){
        $survey_headers = Questionnaireout::get()->where('survey_header_id',$survey_header_id)->first();
        return view("admin\questionnaireout\questionnaireout-edit",compact('survey_headers'));
    }
    function questionnaireout_update(Request $request,$survey_header_id){
        $request->validate([
            'survey_name' => 'required|max:73',
            'instructions' => 'required|max:752',
        ]);
        $survey_header_data=[
            'survey_name'=>$request->survey_name,
            'instructions'=>$request->instructions,
            'instructions_en'=>'',
            'other_header_info'=>'',               //default
            'type'=>'',
            'active'=>'y'                   //default
        ];
        $update_survey = Questionnaireout::where('survey_header_id', $survey_header_id)->first();
        $update_survey->fill($survey_header_data);
        $update_survey->save();
        return redirect()->route('questionnaireout');
    }
    function questionnaireout_delete($survey_header_id){
        $questionnaireout_delete=[
            'active'=>'n'
        ];
        $update_survey = Questionnaireout::where('survey_header_id', $survey_header_id)->first();
        $update_survey->fill($questionnaireout_delete);
        $update_survey->save();
        return redirect()->route('questionnaireout');
    }
    //
    //new p
    function question(){
        $question= DB::table('question')
        ->join('grouptesting', 'question.group_id', '=', 'grouptesting.group_id')
        ->select('question.*', 'grouptesting.group_title')
        ->get();
        return view("admin\Question\Question",compact('question'));
    }
    function question_create(){
        $grouptesting = DB::table('grouptesting')
        ->where('active', 'y')
        ->pluck('group_title', 'group_id');
    
        $question_create = DB::table('question')
            ->join('grouptesting', 'question.group_id', '=', 'grouptesting.group_id')
            ->select('question.*', 'grouptesting.group_title')
            ->get();
        return view("admin\Question\Question_create",compact('question_create','grouptesting'));
    }
    function question_insert(Request $request){
        $request->validate([
            'group_id'=>'required',
            'ques_type'=>'required',
            'test_type'=>'required',
            'difficult'=>'required',
            'ques_title'=>'required',
            'ques_explain'=>'required',
        ]);
        $date=new DateTime('Asia/Bangkok'); 
        $question_data=[
            'group_id'=>$request->group_id,
            'ques_type'=>$request->ques_type,
            'test_type'=>$request->test_type,
            'difficult'=>$request->test_type,
            'ques_title'=>$request->ques_title,
            'ques_explain'=>$request->ques_explain,
            'create_date'=>$date,
            'create_by'=>'1',
            'update_date'=>$date,
            'update_by'=>'1',
            'active'=>'y',
        ];
        DB::table('question')->insert($question_data);
        return redirect('/question');
    }
    function question_edit_page($id){
        $grouptesting = DB::table('grouptesting')
        ->where('active', 'y')
        ->pluck('group_title', 'group_id');
        $question_edit_page= DB::table('question')
        ->where('ques_id',$id)
        ->first();
        return view("admin\Question\Question_edit_page",compact('grouptesting','question_edit_page'));
    }
    function question_edit(Request $request,$id){
        $request->validate([
            'group_id'=>'required',
            'ques_type'=>'required',
            'test_type'=>'required',
            'difficult'=>'required',
            'ques_title'=>'required',
            'ques_explain'=>'required',
        ]);
        $date=new DateTime('Asia/Bangkok'); 
        $question_edit  =[
            'group_id'=>$request->group_id,
            'ques_type'=>$request->ques_type,
            'test_type'=>$request->test_type,
            'difficult'=>$request->test_type,
            'ques_title'=>$request->ques_title,
            'ques_explain'=>$request->ques_explain,
            'update_date'=>$date,
            'update_by'=>'1'
        ]; 
        DB::table('question')->where('ques_id',$id)->update($question_edit);
        return redirect("/question");
    }
    function question_delete($id){
 
        $question_delete=[ 
            'active'=>'n',
        ];
        DB::table('question')->where('ques_id',$id)->update($question_delete);
        return redirect("/question");
    }
    function orgchart(){
        $orgchart =DB::table('orgchart')->get();
        return view("admin\orgchart\orgchart",compact('orgchart'));
    }
    function orgchart_create(){
        return view("admin\orgchart\orgchart-create");
    }
    function orgchart_insert(Request $request){
        $request->validate([
            'title'=>'required|max:24',
            'level' => 'required|max:1',
        ]);
        $orgchart_data=[
            'title'=>$request->title,
            'level'=>$request->level,
            'active'=>'y'                   //default
        ];
        DB::table('orgchart')->insert($orgchart_data);
        return redirect()->route('orgchart');
    }
    function orgchart_edit($orgchart_id){
        $orgchart =DB::table('orgchart')->where('orgchart_id',$orgchart_id)->first();
        return view("admin\orgchart\orgchart-edit",compact('orgchart'));
    }
    function orgchart_update(Request $request,$orgchart_id){
        $request->validate([
            'title'=>'required|max:24',
            'level' => 'required|max:1',
        ]); 
        $orgchart_data=[
            'title'=>$request->title,
            'level'=>$request->level,
            'active'=>'y'                  //default
        ];
        DB::table('orgchart')->where('orgchart_id',$orgchart_id)->update($orgchart_data);
        return redirect()->route('orgchart');
    }
    function orgchart_delete($orgchart_id){
        $orgchart_delete=[
            'active'=>'n'
        ];
        DB::table('orgchart')->where('orgchart_id',$orgchart_id)->update($orgchart_delete);
        return redirect()->route('orgchart');
    }
    
    //  
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
        $faqtype= DB::table('cms_faq_type')->get();
        return view("admin\Faq\Faqtype",compact('faqtype'));
    }
    function faqtype_create(){
        $faqtype_create= DB::table('cms_faq_type')->get();
        return view("admin\Faq\Faqtype_create",compact('faqtype_create'));
    }
    function faqtype_insert(Request $request){
        $request->validate([
            'faq_type_title_TH'=>'required'
        ]);
        $date=new DateTime('Asia/Bangkok'); 
        $faqtype_data=[
            'faq_type_title_TH'=>$request->faq_type_title_TH,
            'create_date'=>$date,
            'create_by'=>'1',
            'update_date'=>$date,
            'update_by'=>'1',
            'active'=>'y',
        ];
        DB::table('cms_faq_type')->insert($faqtype_data);
        return redirect('/faqtype');
    }
    function faqtype_edit_page($id){
        $faqtype_edit_page= DB::table('cms_faq_type')
        ->where('faq_type_id',$id)
        ->first();
        // dd($faqtype_edit_page);
        return view("admin\Faq\Faqtype_edit_page",compact('faqtype_edit_page'));
    }
    function faqtype_edit(Request $request,$id){
        $request->validate([
            'faq_type_title_TH'=>'required',
        ]);
        $date=new DateTime('Asia/Bangkok'); 
        $faqtype_edit  =[
            'faq_type_title_TH'=>$request->faq_type_title_TH,
            'update_date'=>$date,
            'update_by'=>'1'
        ]; 
        DB::table('cms_faq_type')->where('faq_type_id',$id)->update($faqtype_edit);
        return redirect("/faqtype");
    }
    function faqtype_delete($id){
 
        $faqtype_delete=[ 
            'active'=>'n',
        ];
        DB::table('cms_faq_type')->where('faq_type_id',$id)->update($faqtype_delete);
        return redirect("/faqtype");
    }
    function faq(){
        $faq= DB::table('cms_faq')
        ->join('cms_faq_type', 'cms_faq.faq_type_id', '=', 'cms_faq_type.faq_type_id')
        ->select('cms_faq.*', 'cms_faq_type.faq_type_title_TH')
        ->get();
        return view("admin\Faq\Faq",compact('faq'));
    }
    function faq_create(){
        $faq_types = DB::table('cms_faq_type')
        ->where('active', 'y')
        ->pluck('faq_type_title_TH', 'faq_type_id');
    
        $faq_create = DB::table('cms_faq')
            ->join('cms_faq_type', 'cms_faq.faq_type_id', '=', 'cms_faq_type.faq_type_id')
            ->select('cms_faq.*', 'cms_faq_type.faq_type_title_TH')
            ->get();
        
        return view("admin\Faq\Faq_create", compact('faq_create', 'faq_types'));
    }
    function faq_insert(Request $request){
        $request->validate([
            'faq_type_id'=>'required',
            'faq_THtopic'=>'required',
            'faq_THanswer'=>'required'
        ]);
        $date=new DateTime('Asia/Bangkok'); 
        $faq_data=[
            'faq_THtopic'=>$request->faq_THtopic,
            'faq_THanswer'=>$request->faq_THanswer,
            'faq_type_id'=>$request->faq_type_id,
            'create_date'=>$date,
            'faq_hideStatus'=>'1',
            'create_by'=>'1',
            'update_date'=>$date,
            'update_by'=>'1',
            'active'=>'y',
            'sortOrder'=>''
        ];
        DB::table('cms_faq')->insert($faq_data);
        return redirect('/faq');
    }
    function faq_edit_page($id){
        $faq_types = DB::table('cms_faq_type')
        ->where('active', 'y')
        ->pluck('faq_type_title_TH', 'faq_type_id');
        $faq_edit_page= DB::table('cms_faq')
        ->where('faq_nid_',$id)
        ->first();
        return view("admin\Faq\Faq_edit_page",compact('faq_edit_page','faq_types'));
    }
    function faq_edit(Request $request,$id){
        $request->validate([
            'faq_type_id'=>'required',
            'faq_THtopic'=>'required',
            'faq_THanswer'=>'required'
        ]);
        $date=new DateTime('Asia/Bangkok'); 
        $faq_edit  =[
            'faq_THtopic'=>$request->faq_THtopic,
            'faq_THanswer'=>$request->faq_THanswer,
            'faq_type_id'=>$request->faq_type_id,
            'update_date'=>$date,
            'update_by'=>'1',
        ]; 
        DB::table('cms_faq')->where('faq_nid_',$id)->update($faq_edit);
        return redirect("/faq");
    }
    function faq_delete($id){
 
        $faq_delete=[ 
            'active'=>'n',
        ];
        DB::table('cms_faq')->where('faq_nid_',$id)->update($faq_delete);
        return redirect("/faq");
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
    //new p
    function imgslide_create(){
        return view("admin\Imgslide\Imgslide-create");
    }
    function imgslide_insert(Request $request){
        $request->validate([
            'imgslide_link'=>'required|url|max:76',
            'imgslide_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:255',
        ]);
        $date=new DateTime('Asia/Bangkok');
        // $dir="upload/";
        $imageName = time().'.'.$request->imgslide_picture->extension();
        $imgslide_data=[
            'imgslide_link'=>$request->imgslide_link,
            'imgslide_picture'=>$imageName,
            'create_date'=>$date,
            'create_by'=>'1',               //default
            'update_date'=>$date,
            'update_by'=>'1',               //default
            'active'=>'y'                   //default
        ];
        DB::table('imgslide')->insert($imgslide_data);
        $request->imgslide_picture->move(public_path('storage/Imgslides'),$imageName); 
        return redirect()->route('imgslide');
    }
    function imgslide(){
        $imgslide =DB::table('imgslide')->get();
        return view("admin\Imgslide\Imgslide",compact('imgslide'));
    }
    function imgslide_edit($imgslide_id){
        $imgslide =DB::table('imgslide')->where('imgslide_id',$imgslide_id)->first();
        return view("admin\Imgslide\Imgslide-edit",compact('imgslide'));
    }
    function imgslide_update(Request $request,$imgslide_id){
        $request->validate([
            'imgslide_link'=>'required|url|max:76',
            'imgslide_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:255',
        ]);
        $date=new DateTime('Asia/Bangkok');
        $imageName = time().'.'.$request->imgslide_picture->extension();
        $imgslide_data=[
            'imgslide_link'=>$request->imgslide_link,
            'imgslide_picture'=>$imageName,
            'create_date'=>$date,
            'create_by'=>'1',               //default
            'update_date'=>$date,
            'update_by'=>'1',               //default
            'active'=>'y'                   //default
        ];
        DB::table('imgslide')->where('imgslide_id',$imgslide_id)->update($imgslide_data);
        $request->imgslide_picture->move(public_path('storage/Imgslides'),$imageName); 
        return redirect()->route('imgslide');
        
    }
    function imgslide_delete($imgslide_id){
        $imgslide_delete=[
            'active'=>'n'
        ];
        DB::table('imgslide')->where('imgslide_id',$imgslide_id)->update($imgslide_delete);
        return redirect()->route('imgslide');
    }
    //  
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
