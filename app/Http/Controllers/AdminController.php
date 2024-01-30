<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use App\Models\Image;

use Datetime;


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
    function video(){
        return view("admin\video\video");
        return view("admin\video\video");
    }
    function document(){
        $usability =DB::table('usability')->get();
        return view("admin\Document\document",compact('usability'));
    }
    function grouptesting(){
        $grouptesting =DB::table('grouptesting')->get();
        return view("admin\grouptesting\grouptesting",compact('grouptesting'));
    }
    function grouptesting_create(){
        return view("admin\grouptesting\grouptesting-create");
    }
    function document_index_type(){
        return view("admin\Document\Document-index-type");
    }
    function news(){
        $news =DB::table('news')->get();
        return view("admin\News\News",compact('news'));
    }
    function news_create(){
        return view("admin\News\News-create");
    }
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
    
    function coursegrouptesting(){
        return view("admin\coursegrouptesting\coursegrouptesting");
    }
    function questionnaireout(){
        return view("admin\questionnaireout\questionnaireout");
    }
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
        return view("admin\faq\faqtype");
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
        return view("admin\faq\faq");
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


    function upload(Request $request){

        $image = $request->file('cms_picture');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('storage/News'));           //$imageName

        $resizedImage = DB::make(public_path('uploads').'/')->resize(300, 200);     //.$imageName
        $resizedImage->save();

        return redirect()->route('imgslide');
    }

    
    function news_insert(Request $request){
        $request->validate(
            [
                'cms_title'=>'required|max:50',
                'cms_short_title'=>'required'
            ]
            );
            $dir = "uploads/";
            $currentTime = Carbon::now()->toDateTimeString(); // รูปแบบเวลาเป็น 'YYYY-MM-DD HH:MM:SS'
            // $cms = new Cms;
            
            $imageName = time().'.'.$request->cms_picture->extension();

            $data = [
                'cms_title'=>$request->cms_title,
                'cms_short_title'=>$request->cms_short_title,
                'cms_detail'=>$request->cms_detail,
                'cms_picture' =>$imageName,
                'create_date' => $currentTime,
                'create_by'=>'1',
                'update_date' => $currentTime,
                'update_by'=>'1',
                'active' => 'y'
                
                // ใส่ข้อมูลที่ต้องการ insert ให้ครบ
            ];
            
            DB::table('news')->insert($data);
            $request->cms_picture->move(public_path('storage/News'),$imageName); 
            return redirect('/news');
            // dd($data);
    }
    // function change($id){
    //     dd($id);
    // }
    function news_delete($cms_id){
            $news_delete=[ 
                'active'=>'n',
            ];
            DB::table('news')->where('cms_id',$cms_id)->update($news_delete);
            return redirect("/news");
        }


        function news_edit($cms_id){
            // $news =DB::table('news')->get();
            $news=DB::table('news')->where('cms_id',$cms_id)->first();
            // dd($news);
            return view("admin\News\News-edit",compact('news'));
        }


        function news_update(Request $request){
            $request->validate(
                [
                    'cms_title'=>'required|max:50',
                    'cms_short_title'=>'required'
                ]
                );
                $currentTime = Carbon::now('Asia/Bangkok')->toDateTimeString(); // รูปแบบเวลาเป็น 'YYYY-MM-DD HH:MM:SS'
                
                $imageName = time().'.'.$request->cms_picture->extension();
    
                $data = [
                    'cms_title'=>$request->cms_title,
                    'cms_short_title'=>$request->cms_short_title,
                    'cms_detail'=>$request->cms_detail,
                    'cms_picture' =>$imageName,
                    'create_date' => $currentTime,
                    'create_by'=>'1',
                    'update_date' => $currentTime,
                    'update_by'=>'1',
                    'active' => 'y'
                    
                    // ใส่ข้อมูลที่ต้องการ insert ให้ครบ
                ];
                // dd($data);
                DB::table('news')->where('cms_id',$cms_id)->update($data);
                // DB::table('news')->where('cms_id',$cms_id)->first($data);
                $request->cms_picture->move(public_path('storage/News'),$imageName); 
                return redirect('/news');
            }

            function document_insert(Request $request){
                $request->validate(
                    [
                        'usa_title'=>'required|max:50',
                        'usa_short_title'=>'required'
                    ]
                    );
                    $dir = "uploads/";
                    $currentTime = Carbon::now('Asia/Bangkok')->toDateTimeString();
        
                    $data = [
                        'usa_title'=>$request->usa_title,
                        'usa_detail'=>$request->usa_detail,
                        'create_date' => $currentTime,
                        'create_by'=>'1',
                        'update_date' => $currentTime,
                        'update_by'=>'1',
                        'active' => 'y'
                        
                        // ใส่ข้อมูลที่ต้องการ insert ให้ครบ
                    ];
                    
                    DB::table('usability')->insert($data);
                    // $request->cms_picture->move(public_path('storage/News'),$imageName); 
                    // return redirect('/document');
                    // dd($data);
                }
                function document_delete($usa_id){
                    $document_delete=[ 
                        'active'=>'n',
                    ];
                    DB::table('news')->where('usa_id',$usa_id)->update($document_delete);
                    return redirect("/document");
                }
                function document_update(Request $request){
                        $currentTime = Carbon::now('Asia/Bangkok')->toDateTimeString(); // รูปแบบเวลาเป็น 'YYYY-MM-DD HH:MM:SS'
            
                        $data = [
                                'usa_title'=>$request->usa_title,
                                'usa_detail'=>$request->usa_detail,
                                'create_date' => $currentTime,
                                'create_by'=>'1',
                                'update_date' => $currentTime,
                                'update_by'=>'1',
                                'active' => 'y'
                            
                            // ใส่ข้อมูลที่ต้องการ insert ให้ครบ
                        ];
                        // dd($data);
                        DB::table('usability')->where('usa_id',$usa_id)->update($data);
                        // DB::table('news')->where('cms_id',$cms_id)->first($data);
                        return redirect('/document');
                    }

                function document_edit($usa_id){
                    // $news =DB::table('news')->get();
                    $usability=DB::table('usability')->where('usa_id',$usa_id)->first();
                    // dd($news);
                    return view("admin\Document\document-edit",compact('usability'));
                }
                
            function grouptesting_insert(Request $request){
                    $currentTime = Carbon::now('Asia/Bangkok')->toDateTimeString();
                    $data = [
                        'lesson_id'=>$request->Grouptesting["lesson_id"],
                        'group_title'=>$request->Grouptesting["group_title"],
                        'step_id'=>'1',
                        'create_date' => $currentTime,
                        'create_by'=>'1',
                        'update_date' => $currentTime,
                        'update_by'=>'1',
                        'active' => 'y'
                        
                        // ใส่ข้อมูลที่ต้องการ insert ให้ครบ
                    ];
                    
                    DB::table('grouptesting')->insert($data);
                    // dd($data);
                    return redirect('/grouptesting');
                }
                function grouptesting_delete($group_id){
                    $grouptesting_delete=[ 
                        'active'=>'n',
                    ];
                    DB::table('grouptesting')->where('group_id',$group_id)->update($grouptesting_delete);
                    return redirect("/grouptesting");
                }
                function grouptesting_edit($group_id){
                    // $news =DB::table('news')->get();
                    $grouptesting=DB::table('grouptesting')->where('group_id',$group_id)->first();
                    // dd($news);
                    return view("admin\grouptesting\grouptesting-edit",compact('grouptesting'));
                }
                function grouptesting_update(Request $request){
                    $currentTime = Carbon::now('Asia/Bangkok')->toDateTimeString(); // รูปแบบเวลาเป็น 'YYYY-MM-DD HH:MM:SS'
                    $data = [
                        'lesson_id'=>$request->Grouptesting["lesson_id"],
                        'group_title'=>$request->Grouptesting["group_title"],
                        'step_id'=>'1',
                        'create_date' => $currentTime,
                        'create_by'=>'1',
                        'update_date' => $currentTime,
                        'update_by'=>'1',
                        'active' => 'y'
                        
                        // ใส่ข้อมูลที่ต้องการ insert ให้ครบ
                    ];
                    // dd($data);
                     DB::table('grouptesting')->where('group_id',$group_id)->update($data);
                    // DB::table('news')->where('cms_id',$cms_id)->first($data);
                    return redirect('/grouptesting');
                }


               

}

