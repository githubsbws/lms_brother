<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use DateTime;
use App\Facades\AuthFacade;

// use Intervention\Image\Facades\Image;
use App\Models\Questionnaireout;
use Carbon\Carbon;
use App\Models\Image;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Learn;
use App\Models\News;
use App\Models\Faq;
use App\Models\Faq_type;
use App\Models\Pgroup;
use App\Models\Pgroupcondition;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\QuesImport;
use App\Imports\UsersImport;
use App\Models\About;
use App\Models\Captcha;
use App\Models\Conditions;
use App\Models\Setting;
use App\Models\Contactus;
use App\Models\Video;
use App\Models\Orgchart;
use App\Models\Orgcourse;
use App\Models\Imgslide;
use App\Models\Downloadcategoty;
use App\Models\DownloadFileDoc;
use App\Models\DownloadFile;
use App\Models\Downloadtitle;
use App\Models\Category;
use App\Models\Teacher;
use App\Models\Users;
use App\Models\Usability;
use App\Models\File;
use App\Models\FileDoc;
use App\Models\Grouptesting;
use App\Models\Coursegrouptesting;
use App\Models\Manage;
use App\Models\Question;
use App\Models\Logadmin;
use App\Models\Logusers;
use App\Models\Logapprove;
use App\Models\Logapprovepersonal;
use App\Models\Logregister;
use App\Models\Logreset;
use App\Models\Reportproblem;
use App\Models\Coursenotification;
use App\Models\Score;
use App\Models\Choice;
use App\Models\Company;
use App\Models\Division;
use App\Models\QHeader;
use App\Models\QSection;
use App\Models\QQuestion;
use App\Models\QChoice;
use App\Models\Ques_ans;

use App\Models\AdminMenu;
// use App\Models\Company;
// use App\Models\Division;
use App\Models\Permission;
use App\Models\Position;
use App\Models\Profiles;
use App\Models\ProfilesTitle;
// use App\Models\Users;

class AdminController extends Controller
{
    //
    public int $limit = 100;
    function admin(){
        if(AuthFacade::useradmin()){
            return view("admin.index.index");
        }
        return redirect()->route('login.admin');
    }
    function loginadmin(Request $request){
        if ($request->isMethod('post')) {
            $request->validate([
                'username' => 'required|validate_username',
                'password' => 'required',
            ]);
            $password = md5($request->password);
            // dd($password);
            
            $user = Users::join('profiles','profiles.user_id','=','users.id')->where('username', $request->username)->first();
            
            if (!$user || $password != $user->password) {
                // Authentication failed
                // dd($user);
                return back()->withErrors(['username' => 'Invalid credentials'])->withInput($request->only('username'));
            }
            else{
                // Login success
            Auth::login($user);

            $userAdmin = AuthFacade::useradmin();
            // dd($userAdmin->toArray());
            
            if($userAdmin){
                return redirect()->intended('admin');
            }else{
                return back()->withErrors(['username' => 'Invalid credentials'])->withInput($request->only('username'));
            }
            
            }
        }
        return view("admin.login.login");
    }
    public function logoutadmin()
    {
        Auth::logout();

        // Redirect to the home page or any other desired page
        return redirect()->route('login.admin');
    }
    function aboutus(){
        if(AuthFacade::useradmin()){
            $about = About::where('active','y')->get();
            return view("admin.aboutus.aboutus",['about'=>$about]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function aboutus_create(Request $request){
        if(AuthFacade::useradmin()){
            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(), [
                    'about_title' => 'nullable|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'about_detail' =>'nullable|string'
                ]);

                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $about_new = new About;
                $about_new->about_title = $request->input('about_title');
                $about_new->about_detail = htmlspecialchars($request->input('about_detail')); 
                $about_new->create_by = Auth::user()->id;   
                $about_new->update_by = Auth::user()->id;
                $about_new->active = 'y';
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต
        
                $about_new->save();
        
                return redirect()->route('aboutus')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');

            }
            return view("admin.aboutus.aboutus_create");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function aboutus_detail($id){
        if(AuthFacade::useradmin()){
            $about_detail = About::where('about_id',$id)->first();
            return view("admin.aboutus.aboutus_detail",['about_detail'=>$about_detail]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function aboutus_update(Request $request, $id) {
        if(AuthFacade::useradmin()){
            $about_detail = About::where('about_id', $id)->first();
            if ($request->isMethod('post')) { // ตรวจสอบว่าเป็นการร้องขอ POST หรือไม่
                $validator = Validator::make($request->all(), [
                    'about_title' => 'nullable|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'about_detail' =>'nullable|string'
                ]);
                // dd($validator);
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }
        
                $about_update = About::findById($id);
                $about_update->about_title = $request->input('about_title');
                $about_update->about_detail = htmlspecialchars($request->input('about_detail'));    
                $about_update->update_by = Auth::user()->id;
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต
        
                $about_update->save();
        
                return redirect()->route('aboutus')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
        
            return view("admin.aboutus.aboutus_update", ['about_detail' => $about_detail]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function aboutus_delete($id){
        if(AuthFacade::useradmin()){
            $aboutus_del=[
                'active'=>'n'
            ];
            $aboutus = About::findById($id);
            $aboutus->update($aboutus_del);

            // dd($aboutus->toArray());
            return redirect()->route('aboutus');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function condition(){
        if(AuthFacade::useradmin()){
            $conditions = Conditions::where('active','y')->get();
            return view("admin.condition.condition",['conditions' =>$conditions]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function condition_detail($id){
        if(AuthFacade::useradmin()){
            $conditions = Conditions::where('conditions_id',$id)->first();
            return view("admin.condition.condition_detail",['conditions' =>$conditions]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function condition_update(Request $request, $id) {
        if(AuthFacade::useradmin()){
            $conditions = Conditions::where('conditions_id', $id)->first();
            if ($request->isMethod('post')) { // ตรวจสอบว่าเป็นการร้องขอ POST หรือไม่
                $validator = Validator::make($request->all(), [
                    'conditions_title' => 'nullable|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'conditions_detail' =>'nullable|string'
                ]);
                // dd($validator);
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }
        
                $conditions_update = Conditions::findById($id);
                $conditions_update->conditions_title = $request->input('conditions_title');
                $conditions_update->conditions_detail = htmlspecialchars($request->input('conditions_detail'));
                $conditions_update->update_by = Auth::user()->id;
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต
        
                $conditions_update->save();
        
                return redirect()->route('condition')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
        
            return view("admin.condition.condition_update", ['conditions' => $conditions]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function setting(){
        if(AuthFacade::useradmin()){
            $setting = Setting::first();
        
            return view("admin.setting.setting",['setting' => $setting]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function setting_update(Request $request, $id){
        if(AuthFacade::useradmin()){
            $setting = Setting::first();
            if ($request->isMethod('post')) { // ตรวจสอบว่าเป็นการร้องขอ POST หรือไม่
                $validator = Validator::make($request->all(), [
                    'email_room' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'pass_email_room' =>'required|string',
                    'settings_user_email' =>'required|string',
                    'settings_pass_email' =>'required|string',
                    'settings_testing' =>'nullable|string',
                    'settings_register' =>'nullable|string',
                    'settings_score' => 'required|string',
                    'password_expire_day' =>'required|string'

                ]);
                // dd($validator);
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }
        
                $setting_update = Setting::findById($id);
                $setting_update->email_room = $request->input('email_room');
                $setting_update->pass_email_room = $request->input('pass_email_room');
                $setting_update->settings_user_email = $request->input('settings_user_email');
                $setting_update->settings_pass_email = $request->input('settings_pass_email');
                $setting_update->settings_testing = $request->input('settings_testing');
                $setting_update->settings_register = $request->input('settings_register');
                $setting_update->settings_score = $request->input('settings_score');
                $setting_update->password_expire_day = $request->input('password_expire_day');
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต
                if ($request->has('settings_register')) {
                    $setting_update->settings_register = '1';
                }else{
                    $setting_update->settings_register = '0';
                }
                if ($request->has('settings_testing')) {
                    $setting_update->settings_testing = '1';
                }else{
                    $setting_update->settings_testing = '0';
                }

        
                $setting_update->save();
        
                return redirect()->route('setting')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.setting.setting",['setting' => $setting]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function contactus(){
        if(AuthFacade::useradmin()){
            $contactus= Contactus::where('active','y')->paginate(10);

            return view("admin.contactus.contactus",['contactus' => $contactus]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function contactus_view($id){
        if(AuthFacade::useradmin()){
            $contactus= Contactus::where('contac_id',$id)->first();

            return view("admin.contactus.Contactus_view",['contactus' => $contactus]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function contactus_create(){
        if(AuthFacade::useradmin()){
            $contactus_create= DB::table('contactus')->get();
            return view("admin.contactus.Contactus_create",compact('contactus_create'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function contactus_insert(Request $request){
        if(AuthFacade::useradmin()){
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
        }else{
            return redirect()->route('login.admin');
        }
    }
    function contactus_edit_page(Request $request,$id){
        if(AuthFacade::useradmin()){
            $contactus_edit_page= Contactus::where('contac_id',$id)->first();
            if ($request->isMethod('post')) { // ตรวจสอบว่าเป็นการร้องขอ POST หรือไม่
                $validator = Validator::make($request->all(), [
                    'contac_by_name' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'contac_by_surname' =>'required|string',
                    'contac_by_email' =>'required|string',
                    'contac_by_tel' =>'required|string',
                    'contac_subject' =>'required|string',
                    'contac_detail' =>'required|string',
                    'contac_ans_subject' => 'required|string',
                    'contac_ans_detail' =>'required|string'

                ]);
                // dd($validator);
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }
        
                $contactus_update = Contactus::findById($id);
                $contactus_update->contac_by_name = $request->input('contac_by_name');
                $contactus_update->contac_by_surname = $request->input('contac_by_surname');
                $contactus_update->contac_by_email = $request->input('contac_by_email');
                $contactus_update->contac_by_tel = $request->input('contac_by_tel');
                $contactus_update->contac_subject = $request->input('contac_subject');
                $contactus_update->contac_detail = $request->input('contac_detail');
                $contactus_update->contac_ans_subject = $request->input('contac_ans_subject');
                $contactus_update->contac_ans_detail = $request->input('contac_ans_detail');
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต
        
                $contactus_update->save();
        
                return redirect()->route('contactus')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            // dd($contactus_edit_page);
            return view("admin.contactus.Contactus_edit_page",['contactus_edit_page'=>$contactus_edit_page]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function contactus_edit(Request $request,$id){
        if(AuthFacade::useradmin()){
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
        }else{
            return redirect()->route('login.admin');
        }
    }
    function contactus_delete($id){
        if(AuthFacade::useradmin()){
            $contactus_delete=[
                'active'=>'n',
            ];
            DB::table('contactus')->where('contac_id',$id)->update($contactus_delete);
            return redirect("/contactus");
        }else{
            return redirect()->route('login.admin');
        }
    }
    // new p
    function video_create(){
        if(AuthFacade::useradmin()){
            return view("admin.video.video-create");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function video(){
        if(AuthFacade::useradmin()){
            $vdo =DB::table('vdo')->get();
            return view("admin.video.video",compact('vdo'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function video_detail($vdo_id){
        if(AuthFacade::useradmin()){
            $vdo = Video::where('vdo_id',$vdo_id)->first();
            
            return view("admin.video.video_detail",['vdo'=> $vdo]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function video_insert(Request $request){
        if(AuthFacade::useradmin()){
            $request->validate([
                'vdo_title'=>'required|max:115',
                'vdo_path' => 'required|url|max:255',
            ]);
            $date=new DateTime('Asia/Bangkok');
            $vdo_data=[
                'vdo_title'=>$request->vdo_title,
                'vdo_path'=>$request->vdo_path,
                'create_date'=>$date,
                'create_by'=> Auth::user()->id,               //default
                'update_date'=>$date,
                'update_by'=> Auth::user()->id,               //default
                'active'=>'y'                   //default
            ];
            DB::table('vdo')->insert($vdo_data);
            return redirect()->route('video');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function video_edit($vdo_id){
        if(AuthFacade::useradmin()){
            $vdo =DB::table('vdo')->where('vdo_id',$vdo_id)->first();
            return view("admin.video.Video-edit",compact('vdo'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function video_update(Request $request,$vdo_id){
        if(AuthFacade::useradmin()){
            $request->validate([
                'vdo_title'=>'required|max:115',
                'vdo_path' => 'required|url|max:255',
            ]);
            $date=new DateTime('Asia/Bangkok');
            $vdo_data=[
                'vdo_title'=>$request->vdo_title,
                'vdo_path'=>$request->vdo_path,
                'create_date'=>$date,
                'create_by'=> Auth::user()->id,               //default
                'update_date'=>$date,
                'update_by'=> Auth::user()->id,               //default
                'active'=>'y'                   //default
            ];
            DB::table('vdo')->where('vdo_id',$vdo_id)->update($vdo_data);
            return redirect()->route('video');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function video_delete($vdo_id){
        if(AuthFacade::useradmin()){
            $vdo_delete=[
                'active'=>'n'
            ];
            DB::table('vdo')->where('vdo_id',$vdo_id)->update($vdo_delete);
            return redirect()->route('video');
        }else{
            return redirect()->route('login.admin');
        }
    }
    //
    function document(Request $request){
        if(AuthFacade::useradmin()){
            $document = DownloadFileDoc::where('active','y')->orderBy('filedoc_id','DESC')->paginate(10);
            $perPage = $request->input('per_page');
            if($perPage){
                $document = DownloadFileDoc::where('active','y')->orderBy('filedoc_id','DESC')->paginate($perPage);
            }
            return view("admin.document.document",['document' =>$document]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function document_create(Request $request){
        if(AuthFacade::useradmin()){
            $document_title = Downloadtitle::where('active','y')->get();
            $document_type = Downloadcategoty::where('active','y')->get();
            if ($request->isMethod('post')) { // ตรวจสอบว่าเป็นการร้องขอ POST หรือไม่
                $document_cate = Downloadcategoty::where('download_id',$request->input('download_cate'))->first();
                if(!$document_cate){
                    return back()->with('error');
                }
                $document = new DownloadFileDoc;
                $document->filedoc_name = $request->input('filedoc_name');
                $document->active = 'y';
                

                $document_file = new DownloadFile;
                $document_file->download_id = $document_cate->download_id;
                $document_file->title_id = $document_cate->title_id;
                $document_file->active = 'y';
                $document_file->save();

                $document->file_id = $document_file->file_id;
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต
                if($request->file('filedoc')){
                    $doc = $request->file('filedoc');
                    $docname = $doc->getClientOriginalName();
                    $document->filedocname = $docname;

                    $tmp = explode('.', $docname);
                    $fileExtension = end($tmp);

                    if (strtolower($fileExtension) !== 'pdf') {
                        // คำสั่งสำหรับการแจ้งเตือนว่าไฟล์ที่อัปโหลดไม่ใช่ PDF
                        return back()->with('error', 'กรุณาเลือกไฟล์ที่มีนามสกุล .pdf เท่านั้น');
                    }else{
                        $idFolder = public_path('images/uploads/filedoc/');
                        $doc->move($idFolder, $docname);
                    }
                    $document->save();
                }
                // dd($document->toArray());
                $document->save();
                
                return redirect()->route('document')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.document.document_create",['document_type' => $document_type,'document_title' => $document_title]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    public function getDocumentTypes(Request $request, $titleId)
    {
        if($titleId){
            $documentTypes = Downloadcategoty::where('title_id', $titleId)->where('active', 'y')->get();

            if ($documentTypes->isEmpty()) {
                return response()->json(['error' => 'No document types found for the provided titleId'], 404);
            }
            return response()->json($documentTypes);
        }
        // Assuming 'download_id' is the foreign key linking document types to titles
        return response()->json(['error' => 'No titleId provided'], 400);
    }
    function document_edit($id,Request $request){
        if(AuthFacade::useradmin()){
            $document = DownloadFileDoc::where('filedoc_id',$id)->first();
            $document_file = DownloadFile::where('file_id',$document->file_id)->first();
            $document_type = Downloadcategoty::where('download_id',$document_file->download_id)->first();
            $document_cate = Downloadcategoty::where('active','y')->get();
            if ($request->isMethod('post')) { // ตรวจสอบว่าเป็นการร้องขอ POST หรือไม่

                $document = DownloadFileDoc::findById($id);
                $document->filedoc_name = $request->input('filedoc_name');

                $document_file = DownloadFile::findById($document->file_id);
                $document_file->download_id = $request->input('download_cate');
                $document_file->save();
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต
                if($request->file('filedoc')){
                    $doc = $request->file('filedoc');
                    $docname = $doc->getClientOriginalName();
                    $document->filedocname = $docname;

                    $tmp = explode('.', $docname);
                    $fileExtension = end($tmp);

                    // $fileExtension = $request->file('filedoc')->extension();

                    if (strtolower($fileExtension) !== 'pdf') {
                        // คำสั่งสำหรับการแจ้งเตือนว่าไฟล์ที่อัปโหลดไม่ใช่ PDF
                        return back()->with('error', 'กรุณาเลือกไฟล์ที่มีนามสกุล .pdf เท่านั้น');
                    }else{
                        $idFolder = public_path('images/uploads/filedoc/');
                        $doc->move($idFolder, $docname);
                    }
                    $document->save();
                }
                // dd($document->toArray());
                $document->save();
                return redirect()->route('document')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.document.document_edit",['document' =>$document,'document_type' =>$document_type,'document_cate' =>$document_cate]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function document_detail($id){
        if(AuthFacade::useradmin()){
            $document = DownloadFileDoc::where('filedoc_id',$id)->first();

            $type = DownloadFile::join('download_categoty','download_categoty.download_id','=','download_file.download_id')->where('file_id',$document->file_id)->first();

            return view("admin.document.document_detail",['document' =>$document,'type' => $type]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function document_downloadfile($id,Request $request){
            // Retrieve the file information from the database
            $file = DownloadFileDoc::where('filedoc_id',$id)->first();
            $doc_name = $file->filedocname;
            // Check if the file exists
            // dd($file->toArray());
            // Construct the full file path
            $file_path = public_path('images/uploads/filedoc/'.$doc_name);


            // Check if the file actually exists on the server
            if (file_exists($file_path)) {
                return response()->download($file_path, $doc_name);
            } else {
                echo "<script>alert('ไม่พบไฟล์'); window.location.href = '/document';</script>";
            }
    }
    function document_delete($id){
        if(AuthFacade::useradmin()){
            $document_del=[
                'active'=>'n'
            ];
            $document = DownloadFileDoc::findById($id);
            $document->update($document_del);
            return redirect()->route('document');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function document_type(Request $request){
        if(AuthFacade::useradmin()){
            $document_type = Downloadcategoty::where('active','y')->paginate(10);
            $perPage = $request->input('per_page');
            if($perPage){
                $document_type = Downloadcategoty::where('active','y')->paginate($perPage);
            }
            return view("admin.document.document_type",['document_type' =>$document_type]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function document_type_detail($id){
        if(AuthFacade::useradmin()){
            $document_type = Downloadcategoty::where('download_id',$id)->first();

            return view("admin.document.document_type_detail",['document_type' =>$document_type]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function document_type_edit(Request $request,$id){
        if(AuthFacade::useradmin()){
            $document_type = Downloadcategoty::join('download_title','download_title.title_id','=','download_categoty.title_id')->where('download_categoty.download_id',$id)->first();
            $document_title = Downloadtitle::where('active','y')->get();
            if ($request->isMethod('post')) { // ตรวจสอบว่าเป็นการร้องขอ POST หรือไม่

                $document_type = Downloadcategoty::findById($id);
                $document_type->download_name = $request->input('download_name');
                $document_type->title_id = $request->input('document_title');
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต
        
                $document_type->save();
                
                return redirect()->route('document.type')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.document.document_type_edit",['document_type' =>$document_type,'document_title' =>$document_title]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function document_type_create(Request $request){
        if(AuthFacade::useradmin()){
            $document_title = Downloadtitle::where('active','y')->get();
            if ($request->isMethod('post')) { // ตรวจสอบว่าเป็นการร้องขอ POST หรือไม่

                $document_type = new Downloadcategoty;
                $document_type->download_name = $request->input('download_name');
                $document_type->title_id = $request->input('document_title');
                $document_type->active = 'y';
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต
        
                $document_type->save();
                
                return redirect()->route('document.type')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.document.document_type_create",['document_title' => $document_title]);
        }else{
            return redirect()->route('login.admin');
        }
    }

    function document_type_delete($id){
        if(AuthFacade::useradmin()){
            $document_del=[
                'active'=>'n'
            ];
            $document_type = Downloadcategoty::findById($id);
            $document_type->update($document_del);
            return redirect()->route('document.type');
        }else{
            return redirect()->route('login.admin');
        }
    }
    //new p
    function news_create(Request $request){
        if(AuthFacade::useradmin()){
            if ($request->isMethod('post')) { // ตรวจสอบว่าเป็นการร้องขอ POST หรือไม่
                // dd($request->toArray());
                $validator = Validator::make($request->all(), [
                    'cms_title' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'cms_short_title' =>'required|string',
                    'cms_detail' =>'required|string'

                ]);
                // dd($validator);
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $news_create = new News;
                $news_create->cms_title = $request->input('cms_title');
                $news_create->cms_short_title = $request->input('cms_short_title');
                $news_create->cms_detail = htmlspecialchars($request->input('cms_detail'));
                $news_create->create_by = Auth::user()->id;
                $news_create->update_by = Auth::user()->id;
                $news_create->active = 'y';
                ///image
                if($request->file('image')){
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $news_create->cms_picture = $imageName;
                }
                
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต
        
                $news_create->save();
                // dd($news_create->toArray());
                if($request->file('image')){
                    $image = $request->file('image');

                    $idFolder = public_path('images/uploads/news/'.$news_create->cms_id.'/original/');
                    if (!file_exists($idFolder)) {
                        mkdir($idFolder);
                    }

                    // ย้ายไฟล์ภาพไปยังโฟลเดอร์ใหม
                    $image->move($idFolder, $imageName);

                    
                }
                return redirect()->route('news')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.news.news-create");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function news_edit (Request $request,$id){
        if(AuthFacade::useradmin()){
            $news = News::where('cms_id',$id)->first();
            if ($request->isMethod('post')) { // ตรวจสอบว่าเป็นการร้องขอ POST หรือไม่
                // dd($request->toArray());
                $validator = Validator::make($request->all(), [
                    'cms_title' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'cms_short_title' =>'required|string',
                    'cms_detail' =>'required|string'

                ]);
                // dd($validator);
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $news_update = News::findById($id);
                $news_update->cms_title = $request->input('cms_title');
                $news_update->cms_short_title = $request->input('cms_short_title');
                $news_update->cms_detail = htmlspecialchars($request->input('cms_detail'));
                $news_update->update_by = Auth::user()->id;
                if($request->file('image')){
                    $image = $request->file('image');

                    $idFolder = public_path('images/uploads/news/'.$id.'/original/');
                    if (!file_exists($idFolder)) {
                        mkdir($idFolder);
                    }

                    // ย้ายไฟล์ภาพไปยังโฟลเดอร์ใหม่
                    $imageName = $image->getClientOriginalName();
                    $image->move($idFolder, $imageName);

                    $news_update->cms_picture = $imageName;
                    
                }
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต
        
                $news_update->save();
        
                return redirect()->route('news')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.news.News-edit",['news' => $news]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function news(){
        if(AuthFacade::useradmin()){
            $news = News::where('active','y')->paginate(10);
            return view("admin.news.news",['news' => $news]);
        }else{
            return redirect()->route('login.admin');
        }
    }  
    function news_detail($id){
        if(AuthFacade::useradmin()){
            $news = News::where('cms_id',$id)->first();
            return view("admin.news.news_detail",['news' => $news]);
        }else{
            return redirect()->route('login.admin');
        }
    }  
    function news_delete($id){
        if(AuthFacade::useradmin()){
            $news_del=[
                'active'=>'n'
            ];
            $news = News::findById($id);
            $news->update($news_del);

            // dd($news->toArray());
            return redirect()->route('news');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function category(){
        if(AuthFacade::useradmin()){
            $category_on = DB::table('category')->where('category.active', 'y')->orderBy('cate_id', 'desc')->get();
            return view("admin.category.category",compact('category_on'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function category_delete($id){
        if(AuthFacade::useradmin()){
            $category_del=[
                'active'=>'n'
            ];
            $category = Category::findById($id);
            $category->update($category_del);
            return redirect()->route('category');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function category_create(Request $request){
        if(AuthFacade::useradmin()){
            if ($request->isMethod('post')) { // ตรวจสอบว่าเป็นการร้องขอ POST หรือไม่
                // dd($request->toArray());
                $validator = Validator::make($request->all(), [
                    'cate_title' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'cate_short_detail' =>'required|string',
                    'cate_detail' =>'required|string'

                ]);
                // dd($validator);
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $category_update = new Category;
                $category_update->cate_title = $request->input('cate_title');
                $category_update->cate_short_detail = $request->input('cate_short_detail');
                $category_update->cate_detail = htmlspecialchars($request->input('cate_detail'));
                $category_update->update_by = Auth::user()->id;

                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต

                if($request->file('image')){
                    $image = $request->file('image');
                    $imageName = $image->getClientOriginalName();
                    $category_update->cate_image = $imageName;

                    $idFolder = public_path('images/uploads/category/'.$category_update->cate_id.'/original/');
                    if (!file_exists($idFolder)) {
                        mkdir($idFolder);
                    }

                    // ย้ายไฟล์ภาพไปยังโฟลเดอร์ใหม่
                    $image->move($idFolder, $imageName);

                    
                    
                }
                $category_update->save();
        
                return redirect()->route('category')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.category.category_create");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function category_detail($id){
        if(AuthFacade::useradmin()){
            $category = Category::where('cate_id',$id)->first();

            return view("admin.category.category_detail",compact('category'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function category_edit(Request $request,$id){
        if(AuthFacade::useradmin()){
            $category = Category::where('cate_id',$id)->first();
            if ($request->isMethod('post')) { // ตรวจสอบว่าเป็นการร้องขอ POST หรือไม่
                // dd($request->toArray());
                $validator = Validator::make($request->all(), [
                    'cate_title' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'cate_short_detail' =>'required|string',
                    'cate_detail' =>'required|string'

                ]);
                // dd($validator);
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $category_update = Category::findById($id);
                $category_update->cate_title = $request->input('cate_title');
                $category_update->cate_short_detail = $request->input('cate_short_detail');
                $category_update->cate_detail = htmlspecialchars($request->input('cate_detail'));
                $category_update->update_by = Auth::user()->id;
                if($request->file('image')){
                    $image = $request->file('image');

                    $idFolder = public_path('images/uploads/category/'.$id.'/original/');
                    if (!file_exists($idFolder)) {
                        mkdir($idFolder);
                    }

                    // ย้ายไฟล์ภาพไปยังโฟลเดอร์ใหม่
                    $imageName = $image->getClientOriginalName();
                    $image->move($idFolder, $imageName);

                    $category_update->cate_image = $imageName;
                    
                }
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต
        
                $category_update->save();
        
                return redirect()->route('category')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.category.category_edit",compact('category'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function category_openshow(Request $request,$id){
        if(AuthFacade::useradmin()){
            $category = Category::where('cate_id',$id)->first();
            if ($request->has('on')) { // ตรวจสอบว่าเป็นการร้องขอ POST หรือไม่
                $showValue = $request->input('on');
                // dd($showValue);
            }elseif($request->has('off')){
                $showValue = $request->input('off');
            }
                // dd($showValue);
                $category_update = Category::findById($id);
                $category_update->cate_show = $showValue;
                $category_update->update_by = Auth::user()->id;
                
                $category_update->save();
        
                return redirect()->route('category')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            return redirect()->route('category');
        }else{
            return redirect()->route('login.admin');
        }
    }
    
    function courseonline(){
        if(AuthFacade::useradmin()){
            $course_online = Course::join('category', 'category.cate_id', '=', 'course_online.cate_id')->where('course_online.active', 'y')->orderBy('sortOrder', 'desc')->paginate(10);
            return view("admin.courseonline.courseonline", compact('course_online'));
        }else{
            return redirect()->route('login.admin');
        }
    }

    function courseonline_delete($id){
        if(AuthFacade::useradmin()){
            $courseonline_del=[
                'active'=>'n'
            ];
            $courseonline = Course::findById($id);
            $courseonline->update($courseonline_del);
            return redirect()->route('courseonline');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function courseonline_detail($id){
        if(AuthFacade::useradmin()){
            $course_online = Course::join('category', 'category.cate_id', '=', 'course_online.cate_id')->where('course_online.course_id',$id)->first();
            return view("admin.courseonline.courseonline_detail", compact('course_online'));
        }else{
            return redirect()->route('login.admin');
        }
    }

    function courseonline_edit(Request $request, $id)
    {
        if(AuthFacade::useradmin()){
            $course_detail = DB::table('course_online')->where('course_id', $id)->first();
            $category = DB::table('category')->pluck('cate_title', 'cate_id');
            $teacher = Teacher::where('active','y')->get();
            if ($request->isMethod('post')) {
                // dd($request->toArray());
                $validator = Validator::make($request->all(), [
                    'cate_id' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'course_title' =>'required|string',
                    'course_short_title'=>'required|string',

                ]);
                // dd($validator);
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $course_update = Course::findById($id);
                $course_update->cate_id = $request->input('cate_id');
                $course_update->course_lecturer = $request->input('teacher_name');
                $course_update->course_title = $request->input('course_title');
                $course_update->course_short_title = htmlspecialchars($request->input('course_short_title'));
                $course_update->course_detail = htmlspecialchars($request->input('course_detail'));
                $course_update->course_note = $request->input('course_note');
                $course_update->update_by = Auth::user()->id;

                if ($request->has('recommend')) {
                    $course_update->recommend = 'y';
                }else{
                    $course_update->recommend = 'n';
                }

                if($request->file('image')){
                    $image = $request->file('image');

                    $idFolder = public_path('images/uploads/course/'.$id.'/original/');
                    if (!file_exists($idFolder)) {
                        mkdir($idFolder);
                    }

                    // ย้ายไฟล์ภาพไปยังโฟลเดอร์ใหม่
                    $imageName = $image->getClientOriginalName();
                    $image->move($idFolder, $imageName);

                    $course_update->cate_image = $imageName;
                    
                }
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต

                $course_update->save();

                return redirect()->route('courseonline')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.courseonline.courseonline_edit", compact('course_detail', 'category','teacher'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function courseonline_create(Request $request)
    {
        if(AuthFacade::useradmin()){
            $category = DB::table('category')->where('active','y')->pluck('cate_title', 'cate_id');
            $teacher = Teacher::where('active','y')->get();
            if ($request->isMethod('post')) {
                // dd($request->toArray());
                $validator = Validator::make($request->all(), [
                    'cate_id' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'course_title' =>'required|string',
                    'course_short_title'=>'required|string',
                    'course_detail'=>'required|string',

                ]);
                $teacher = Teacher::where('teacher_name',$request->input('teacher_name'))->first();
                
                // dd($validator);
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $course_update = new Course;
                $course_update->cate_id = $request->input('cate_id');
                $course_update->course_lecturer = $request->input('teacher_name');
                $course_update->course_title = $request->input('course_title');
                $course_update->course_short_title = htmlspecialchars($request->input('course_short_title'));
                $course_update->course_note = $request->input('course_note');
                $course_update->course_detail = htmlspecialchars($request->input('course_detail'));
                $course_update->update_by = Auth::user()->id;
                $course_update->create_by = Auth::user()->id;
                $course_update->active = 'y';

                if ($request->has('recommend')) {
                    $course_update->recommend = 'y';
                }else{
                    $course_update->recommend = 'n';
                }

                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต

                $course_update->save();

                if($request->file('image')){
                    $image = $request->file('image');
                    $imageName = $image->getClientOriginalName();
                    $course_update->course_picture = $imageName;

                    $idFolder = public_path('images/uploads/courseonline/'.$course_update->course_id.'/original/');
                    if (!file_exists($idFolder)) {
                        mkdir($idFolder);
                    }

                    // ย้ายไฟล์ภาพไปยังโฟลเดอร์ใหม่
                    
                    $image->move($idFolder, $imageName);

                    
                    
                }
                $course_update->sortOrder = $course_update->course_id;
                $course_update->save();

                return redirect()->route('courseonline')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.courseonline.courseonline_create", compact('category','teacher'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function courseonlinecreateto(Request $request)
    {
        if(AuthFacade::useradmin()){
            $request->validate([
                'course_picture' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ]);
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
        }else{
            return redirect()->route('login.admin');
        }
    }
    // course edit
    function courseonlineedit(Request $request, $id)
    {
        if(AuthFacade::useradmin()){
            $course_detail = DB::table('course_online')->where('course_id', $id)->first();
            $category = DB::table('category')->pluck('cate_title', 'cate_id');
            return view("admin.courseonline.courseonline-edit", compact('course_detail', 'category'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    // course edit to 
    function courseonlineeditto(Request $request, $id)
    {
        if(AuthFacade::useradmin()){
            $request->validate([
                'course_picture' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ]);
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
        }else{
            return redirect()->route('login.admin');
        }
    }
    // course change to id
    function courseonlinechange($id)
    {
        if(AuthFacade::useradmin()){
            $course_detail = DB::table('course_online')->where('course_id', $id)->first();
            // ตรวจสอบค่าปัจจุบันของ 'active' และกำหนดค่าใหม่
            $newActive = ($course_detail->active == 'y') ? 'n' : 'y';
            $data = [
                'active' => $newActive,
            ];
            DB::table('course_online')->where('course_id', $id)->update($data);
            $redirectUrl = route('courseonline');
            return redirect($redirectUrl);
        }else{
            return redirect()->route('login.admin');
        }
    }
     // course det show
     function courseonlinedet(Request $request, $id)
     {
        if(AuthFacade::useradmin()){

        }else{
            return redirect()->route('login.admin');
        }
     }
    function lesson(){
        if(AuthFacade::useradmin()){
            $course_online = Course::where('active', 'y')->orderBy('sortOrder', 'desc')->get();
            $lesson = Lesson::where('lesson.active', 'y')->paginate(10);
            return view("admin.lesson.lesson",compact('course_online','lesson'));
        }else{
            return redirect()->route('login.admin');
        }
    }

    function lesson_detail($id){
        if(AuthFacade::useradmin()){
            $lesson = Lesson::join('course_online','course_online.course_id','=','lesson.course_id')->where('lesson.id',$id)->first();
            $file = File::where('lesson_id',$id)->where('active','y')->first();
            $filedoc = FileDoc::where('lesson_id',$id)->where('active','y')->first();
            
            return view("admin.lesson.lesson_detail",compact('lesson','file','filedoc'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function downloadfile($id,  Request $request){
         // Retrieve the file information from the database
         $file = FileDoc::where('id',$id)->first();
         // Check if the file exists
     
         // Construct the full file path
         $file_path = public_path('images/uploads/filedoc'.DIRECTORY_SEPARATOR. $file->filename);
    
    
         // Check if the file actually exists on the server
         if (!file_exists($file_path)) {
             return response()->json(['error' => 'File not found on the server'], 404);
         }
     
         // Generate the response for downloading the file
         return response()->download($file_path, $file->original_filename);
    }
    function lesson_delete($id){
        if(AuthFacade::useradmin()){
            $lesson_del=[
                'active'=>'n'
            ];
            $lesson = Lesson::findById($id);
            $lesson->update($lesson_del);
            return redirect()->route('lesson');
        }else{
            return redirect()->route('login.admin');
        }
    }  

    function lesson_delete_video($id){
        if(AuthFacade::useradmin()){
            $file_del=[
                'active'=>'n'
            ];
            $file = File::findById($id);
            $file->update($file_del);
            return redirect()->route('lesson');
        }else{
            return redirect()->route('login.admin');
        }
    }  

    function lesson_edit(Request $request,$id){
        if(AuthFacade::useradmin()){
            $course_online = Course::where('course_online.active', 'y')->orderBy('course_id', 'desc')->get();
            $lesson = Lesson::join('course_online','course_online.course_id','=','lesson.course_id')->where('lesson.id',$id)->first();
            $file = File::where('lesson_id',$id)->where('active','y')->first();
            $filedoc = FileDoc::where('lesson_id',$id)->where('active','y')->first();

            if ($request->isMethod('post')) {
                // dd($request->toArray());
                $validator = Validator::make($request->all(), [
                    'course_id' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'title' =>'required|string',
                    'description' =>'required|string',
                    'cate_amount'=>'required|string',
                    'time_test'=>'required|string',
                    'content'=>'required|string'

                ]);
                
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $lesson_update = Lesson::findById($id);
                $lesson_update->course_id = $request->input('course_id');
                $lesson_update->title = $request->input('title');
                $lesson_update->description = $request->input('description');
                $lesson_update->content = htmlspecialchars($request->input('content'));
                $lesson_update->cate_amount = $request->input('cate_amount');
                $lesson_update->time_test = $request->input('time_test');
                $lesson_update->update_by = Auth::user()->id;

                if ($request->hasFile('filename')) {
                    $validator = Validator::make($request->all(), [
                        'filename' => 'required|mimes:mp3,mp4',     
                    ]);
            
                    if ($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $filename = $request->file('filename');
                    $file_name = $filename->getClientOriginalName();

                    $idFolder = public_path('images/uploads/lesson/');
                    if (!file_exists($idFolder)) {
                        mkdir($idFolder);
                    }
                    $filename->move($idFolder, $file_name);

                    
                    $file_update = new File;
                    $file_update->lesson_id = $id;
                    $file_update->file_name = $lesson->title;
                    $file_update->filename = $file_name;
                    $file_update->length = '2.00';
                    $file_update->create_by = Auth::user()->id;
                    $file_update->update_by = Auth::user()->id;
                    $file_update->active = 'y';
                    $file_update->views = '0';
                    $file_update->save();

                }
                
                if($request->hasFile('doc')){
                    $validator = Validator::make($request->all(), [
                        'doc' => 'required|mimes:pdf,docx,pptx',
                    ]);

                    if ($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $doc = $request->file('doc');
                    $doc_name = $doc->getClientOriginalName();
                    // dd($doc_name);
                    if(!$doc_name){
                        return redirect()->back()->withErrors($validator)->withInput(); 
                    }
                    $doc_update = FileDoc::where('lesson_id',$id)->first();
                    $doc_part = FileDoc::where('lesson_id','<',$id)->first();
                    $doc_update->position = $doc_part++;
                    $doc_update->filename = $doc_name;
                    $doc_update->update_by = Auth::user()->id;
                    $doc_update->save();

                    $idFolder = public_path('images/uploads/filedoc/');
                    if (!file_exists($idFolder)) {
                        mkdir($idFolder);
                    }
                    $doc->move($idFolder, $doc_name);
                }
                
                if($request->file('image')){
                    $image = $request->file('image');

                    $idFolder = public_path('images/uploads/lesson/'.$id.'/original/');
                    if (!file_exists($idFolder)) {
                        mkdir($idFolder);
                    }

                    // ย้ายไฟล์ภาพไปยังโฟลเดอร์ใหม่
                    $imageName = $image->getClientOriginalName();
                    $image->move($idFolder, $imageName);

                    $lesson_update->image = $imageName;
                    
                }
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต

                $lesson_update->save();

                return redirect()->route('lesson')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }

            return view("admin.lesson.lesson_edit",compact('course_online','lesson','file','filedoc'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function lesson_create(Request $request){
        if(AuthFacade::useradmin()){
            $course_online = Course::where('course_online.active', 'y')->orderBy('course_id', 'desc')->get();
            

            if ($request->isMethod('post')) {
                // dd($request->toArray());
                $validator = Validator::make($request->all(), [
                    'course_id' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'title' =>'required|string',
                    'description' =>'required|string',
                    'cate_amount'=>'required|string',
                    'time_test'=>'required|string',
                    'content' =>'required|string'

                ]);
                
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $lesson_create = new Lesson;
                $lesson_create->course_id = $request->input('course_id');
                $lesson_create->title = $request->input('title');
                $lesson_create->content = htmlspecialchars($request->input('content'));
                $lesson_create->description = $request->input('description');
                $lesson_create->cate_amount = $request->input('cate_amount');
                $lesson_create->time_test = $request->input('time_test');
                $lesson_create->update_by = Auth::user()->id;
                $lesson_create->active = 'y';
                $lesson_create->save();

                if($request->file('image')){
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();


                }
                if ($request->hasFile('filename')) {
                    $validator = Validator::make($request->all(), [
                        'filename' => 'required|mimes:mp3,mp4'
                    ]);
            
                    if ($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $filename = $request->file('filename');
                    
                    $file_name = $filename->getClientOriginalName();
                    

                    $file_new = new File;
                    $file_new->lesson_id = $lesson_create->id;
                    $file_new->file_name = $lesson_create->title;
                    $file_new->filename = $file_name;
                    $file_new->length = '2.00';
                    $file_new->create_by = Auth::user()->id;
                    $file_new->update_by = Auth::user()->id;
                    $file_new->active = 'y';
                    $file_new->views = '0';
                    $file_new->save();

                    $idFolder = public_path('images/uploads/lesson/');
                    if (!file_exists($idFolder)) {
                        mkdir($idFolder);
                    }
                    $filename->move($idFolder, $file_name);
                    //---------------------------------------//

                }
                if($request->hasFile('doc')){
                    $validator = Validator::make($request->all(), [
                        'doc' => 'required|mimes:pdf,docx,pptx',
                    ]);
            
                    if ($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $doc = $request->file('doc');
                    $doc_name = $doc->getClientOriginalName();

                    $doc_new = new FileDoc;
                    $doc_new->lesson_id = $lesson_create->id;
                    $doc_new->file_name = $lesson_create->title;
                    $doc_new->filename = $doc_name;
                    $doc_new->length = '2.00';
                    $doc_new->create_by = Auth::user()->id;
                    $doc_new->update_by = Auth::user()->id;
                    $doc_new->active = 'y';
                    $doc_new->save();

                    $idFolder = public_path('images/uploads/filedoc/');
                    if (!file_exists($idFolder)) {
                        mkdir($idFolder);
                    }
                    $doc->move($idFolder, $doc_name);
                    //-----------------------------------------//
                }
                if($request->file('image')){
                    

                    $idFolder = public_path('images/uploads/lesson/'.$lesson_create->id.'/original/');
                    if (!file_exists($idFolder)) {
                        mkdir($idFolder);
                    }

                    // ย้ายไฟล์ภาพไปยังโฟลเดอร์ใหม่
                
                    $image->move($idFolder, $imageName);

                    $lesson_create->image = $imageName;
                    
                    $lesson_create->save();
                }
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต
                $lesson_create->sort_lesson = $lesson_create->id;
                $lesson_create->save();

                return redirect()->route('lesson')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }

            return view("admin.lesson.lesson_create",compact('course_online'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    
    function filemanagers(Request $request, $id = null){
        if(AuthFacade::useradmin()){
            if($id !== null){
                $file = File::where('lesson_id', $id)->where('active', 'y')->paginate(10);
            } else {
                $file = File::where('active', 'y')->paginate(10);
            }
            return view("admin.file_managers.file_managers", ['file' => $file]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    //new p
    function grouptesting_create(Request $request){
        if(AuthFacade::useradmin()){
            $lesson = Lesson::where('active','y')->get();

            if ($request->isMethod('post')) {
                // dd($request->toArray());
                $validator = Validator::make($request->all(), [
                    'lesson_id' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'group_title' =>'required|string'

                ]);
                
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $grouptesting_create = new Grouptesting;
                $grouptesting_create->lesson_id = $request->input('lesson_id');
                $grouptesting_create->group_title = $request->input('group_title');
                $grouptesting_create->step_id = '1';
                $grouptesting_create->create_by = Auth::user()->id;
                $grouptesting_create->update_by = Auth::user()->id;
                $grouptesting_create->active = 'y';
                $grouptesting_create->save();

                return redirect()->route('grouptesting')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }


            return view("admin.grouptesting.grouptesting-create",['lesson' => $lesson]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function grouptesting(Request $request, $id = null, $type = null){
        if(AuthFacade::useradmin()){
            $id = $request->query('id');
            $type = $request->query('type');
            if($id !== null && $type !== null ){
                $manage = Manage::where('id', $id)->where('type', $type)->first();
                // ตรวจสอบว่า $manage ไม่เป็น null ก่อนที่จะดำเนินการต่อ
                if($manage !== null){
                    $grouptesting = Grouptesting::where('lesson_id', $manage->id)->where('active', 'y')->paginate(10);
                } else {
                    $grouptesting = Grouptesting::where('active','y')->paginate(10);
                }
            } else {
                $grouptesting = Grouptesting::where('active','y')->paginate(10);
            }
            
            return view("admin.grouptesting.grouptesting",['grouptesting' => $grouptesting]);
        }else{
            return redirect()->route('login.admin');
        }
    }

    function grouptesting_plan(Request $request, $id = null, $type = null){
        if(AuthFacade::useradmin()){
            $group = Grouptesting::where('lesson_id',$id)->where('active','n')->get();
            
            $group_active = Grouptesting::join('lesson','lesson.id','=','grouptesting.lesson_id')->where('grouptesting.active','y')->where('lesson_id',$id)->get();

            if ($request->has('id')) {
                // คืนค่า JSON แจ้งข้อผิดพลาดว่าไม่มีค่า ID ถูกส่งมา
                $group_id = $request->input('id');
                $group_del=[
                    'active'=>'y'
                ];
                $group = Grouptesting::findById($group_id);
                $group->update($group_del);

                $manage = Manage::where('group_id',$group_id)->where('type',$type)->first();
                if($manage == null){
                    $manage_new = new Manage;
                    $manage_new->id = $group->lesson_id;
                    $manage_new->group_id = $group->group_id;
                    $manage_new->type = $type;
                    $manage_new->manage_row = '5';
                    $manage_new->create_by = Auth::user()->id;
                    $manage_new->update_by = Auth::user()->id;
                    $manage_new->active = 'y';
                    $manage_new->save();

                    
                }else{
                    $manage->active = 'y';
                    $manage->save();

                
                }
                // กรณีที่ไม่มีการส่งค่า id มา
                // คุณสามารถตัดสินใจปฏิเสธคำขอหรือดำเนินการอื่น ๆ ตามที่ต้องการได้
                return $manage;       
            }
            return view("admin.grouptesting.grouptesting_plan",['group' => $group,'group_active' => $group_active,'type'=>$type,'id' => $id]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    //

    function grouptesting_edit(Request $request, $id){
        if(AuthFacade::useradmin()){
            $group = Grouptesting::join('lesson','lesson.id','=','grouptesting.lesson_id')->where('group_id',$id)->first();
            $lesson = Lesson::where('active','y')->get();
            if ($request->isMethod('post')) {
                // dd($request->toArray());
                $validator = Validator::make($request->all(), [
                    'group_title' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                ]);
                
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $group_update = Grouptesting::findById($id);
                $group_update->group_title = $request->input('group_title');
                $group_update->lesson_id = $request->input('lesson_id');
                $group_update->update_by = Auth::user()->id;

                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต

                $group_update->save();

                return redirect()->route('grouptesting')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }

            return view("admin.grouptesting.grouptesting-edit",['lesson' => $lesson,'group' => $group ]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function grouptesting_detail($id){
        if(AuthFacade::useradmin()){
            $group = Grouptesting::join('lesson','lesson.id','=','grouptesting.lesson_id')->where('group_id',$id)->first();
            
            return view("admin.grouptesting.grouptesting_detail",['group' => $group ]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function grouptesting_delete($id){
        if(AuthFacade::useradmin()){
            $grouptesting_del=[
                'active'=>'n'
            ];
            $grouptesting = Grouptesting::findById($id);
            $grouptesting->update($grouptesting_del);

            return redirect()->route('grouptesting');
        }else{
            return redirect()->route('login.admin');
        }
    }
    public function group_question_create(Request $request,$id = null){
        if(AuthFacade::useradmin()){
            if(request()->has('Question')) {
                // dd($_POST['Question']);
                // dd(request()->input('QuestionType'));
                // dd(request()->input('QuestionType'));
                foreach(request('Question') as $ques => $question) {
                    // dump($question); 
                    $key = 1;
                    $questionTypeArray = ['checkbox' => 1, 'radio' => 2, 'textarea' => 3];
                    // $questionTitle = $question;
                    $questionType = null;
                    $questionTypeArray = request()->input('QuestionType');
                    if ($questionTypeArray && isset($questionTypeArray[$key])) {
                        $questionType = $questionTypeArray[$key];
                        // dd($questionType);
                    }
                    $question_title = $question[$key];
                    if ($question_title && isset($question[$key])) {
                        // dd($question_title);
                        $question_title = $question[$key];
                    }
                    $questionModel = new Question();
                    $questionModel->group_id = $id;
                    $questionModel->ques_type = $questionType;
                    $questionModel->ques_title = $question_title;
                    $questionModel->ques_explain = '';
                    $questionModel->create_by = Auth::user()->id;
                    $questionModel->update_by = Auth::user()->id;
                    $questionModel->active = 'y';
                    
                    if ($questionModel->save()) {
                        if($questionType != 'textarea') {
                            $choicesss =request('Choice');
                            $choices = $choicesss['choice_detail'];
                            $choiceTypes = $choicesss['choice_type'];
                            $choiceAnswers = $choicesss['choice_answer'];
                            // dd($choicesss);
                            // dd($choicesss['choice_answer']);
                            if (is_array($choices) && is_array($choiceTypes) && is_array($choiceAnswers)) {
                                foreach ($choices as $key => $choiceDetails) {
                                    // dd($choiceDetails);
                                    // ตรวจสอบว่าข้อมูลในอาร์เรย์ $choiceDetails เป็นอาร์เรย์หรือไม่ก่อนที่จะวนลูป
                                    if (is_array($choiceDetails)) {
                                        // dd($choiceDetails);
                                        foreach ($choiceDetails as $index => $choiceDetail) {
                                            
                                            // สร้างและบันทึกข้อมูลตัวเลือก (Choice)
                                            $choiceModel = new Choice();
                                            $choiceModel->ques_id = $questionModel->ques_id;
                                            $choiceModel->choice_detail = $choiceDetail;
                                            $choiceModel->choice_type = $choiceTypes[$key][$index];
                                            $choiceModel->choice_answer = $choiceTypes[$key][$index];
                                            $choiceModel->create_by = Auth::user()->id;
                                            $choiceModel->update_by = Auth::user()->id;
                                            $choiceModel->save();
                                        }
                                    }
                                }
                            }
                        }
                    }else{
                        $errors = $questionModel->errors();
                        // แสดงข้อผิดพลาด
                        dd($errors);
                    }
                }
                return redirect()->route('grouptesting');
            }

            return view("admin.grouptesting.group_question_create",['id' => $id]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    
    function group_question($id = null){
        if(AuthFacade::useradmin()){
            if($id !== null){
                $coursegrouptesting = Question::where('group_id',$id)->where('active','y')->paginate(10);
                // dd($coursegrouptesting);
            }else{
                $coursegrouptesting = Question::where('active','y')->paginate(10);
            }
            return view("admin.grouptesting.group_question",['coursegrouptesting' =>$coursegrouptesting]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function group_question_detail($id){
        if(AuthFacade::useradmin()){
            $group = Question::where('ques_id',$id)->first();
            
            return view("admin.grouptesting.ques_detail",['group' => $group ]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function group_question_edit(Request $request,$id){
        if(AuthFacade::useradmin()){
            $group = Question::where('ques_id',$id)->first();
            if($request->isMethod('post')){
                $validator = Validator::make($request->all(), [
                    'ques_title' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                ]);

                $ques = Question::findById($id);
                $ques->ques_title = htmlspecialchars($request->input('ques_title'));
                $ques->save();

                return redirect()->route('group_question');
            }
            
            return view("admin.grouptesting.ques_edit",['group' => $group,'id' => $id ]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function group_question_delete($id){
        if(AuthFacade::useradmin()){
            $ques_del=[
                'active'=>'n'
            ];
            $ques = Question::findById($id);
            $ques->update($ques_del);

            return redirect()->route('grouptesting');
        }else{
            return redirect()->route('login.admin');
        }
    }
    public function group_question_excel(Request $request,$id){
        if(AuthFacade::useradmin()){
            $group = Grouptesting::where('group_id',$id)->first();
            if ($request->isMethod('post')) {
                $request->validate([
                    'import_excel' =>
                    ['required','file','mimes:xlsx, xls'],
                    [
                        'import_excel.required' => 'คุณยังไม่ได้ Uploadfile',
                        'import_excel.mimes' => 'กรุณาใช้ไฟล์สกุล xlsx xls'
                    ]
        
        
                ]);
        
                $excel = Excel::import(new QuesImport($id), $request->file('import_excel'));

                // dd($excel);
        
                // return redirect()->back()->with('success', 'Excel imported successfully!');
                return redirect()->route('grouptesting');
            }
            
            return view("admin.grouptesting.ques_excel",['group' => $group]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    //new p
    function coursegrouptesting_create(Request $request){
        if(AuthFacade::useradmin()){
            $course = Course::where('active','y')->get();

            if ($request->isMethod('post')) {
                // dd($request->toArray());
                $validator = Validator::make($request->all(), [
                    'course_id' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'group_title' =>'required|string'

                ]);
                
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $grouptesting_create = new Coursegrouptesting;
                $grouptesting_create->course_id = $request->input('course_id');
                $grouptesting_create->group_title = $request->input('group_title');
                $grouptesting_create->step_id = '1';
                $grouptesting_create->create_by = Auth::user()->id;
                $grouptesting_create->update_by = Auth::user()->id;
                $grouptesting_create->active = 'y';
                $grouptesting_create->lang_id = '1';
                $grouptesting_create->domain_id = '15';
                $grouptesting_create->save();

                return redirect()->route('coursegrouptesting')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.coursegrouptesting.coursegrouptesting-create",['course' => $course]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function coursegrouptesting(Request $request, $id = null){
        if(AuthFacade::useradmin()){
            if($id !== null){
                $coursegrouptesting = Coursegrouptesting::join('course_online','course_online.course_id','=','coursegrouptesting.course_id')->where('group_id',$id)->paginate(10);
            }else{
                $coursegrouptesting = Coursegrouptesting::join('course_online','course_online.course_id','=','coursegrouptesting.course_id')->where('coursegrouptesting.active','y')->paginate(10);
            }
            return view("admin.coursegrouptesting.coursegrouptesting",['coursegrouptesting' =>$coursegrouptesting]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function coursegrouptesting_plan(Request $request, $id = null){
        if(AuthFacade::useradmin()){
            $course_group = Coursegrouptesting::where('course_id',$id)->where('active','n')->get();
            
            $course_group_active = Coursegrouptesting::join('course_online','course_online.course_id','=','coursegrouptesting.course_id')->where('coursegrouptesting.active','y')->where('coursegrouptesting.course_id',$id)->get();

            if ($request->has('id')) {
                // คืนค่า JSON แจ้งข้อผิดพลาดว่าไม่มีค่า ID ถูกส่งมา
                $group_id = $request->input('id');
                $group_del=[
                    'active'=>'y'
                ];
                $group = Coursegrouptesting::findById($group_id);
                $group->update($group_del);

                // กรณีที่ไม่มีการส่งค่า id มา
                // คุณสามารถตัดสินใจปฏิเสธคำขอหรือดำเนินการอื่น ๆ ตามที่ต้องการได้
                return response()->json(['success' => true]);       
            }
            return view("admin.coursegrouptesting.coursegrouptesting_plan",['course_group' => $course_group,'course_group_active' => $course_group_active,'id' => $id]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    //

    //new p
    function questionnaireout(){
        if(AuthFacade::useradmin()){
            $survey_headers = QHeader::where('active','y')->paginate(10);
            return view("admin.questionnaireout.questionnaireout",compact('survey_headers'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function questionnaireout_plan(Request $request, $id){
        if(AuthFacade::useradmin()){
            $lesson_id = $id;
            $survey_headers = QHeader::where('active','y')->paginate(10);
            if ($request->has('id')) {
                // คืนค่า JSON แจ้งข้อผิดพลาดว่าไม่มีค่า ID ถูกส่งมา
                $header_id = $request->input('id');
                
                $lesson = Lesson::findById($lesson_id);
                $lesson->header_id = $header_id;
                $lesson->save();

                return response()->json(['success' => true]);       
            }
            return view("admin.questionnaireout.questionnaireout_plan",compact('survey_headers','lesson_id'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function questionnaireout_create(Request $request){
        if(AuthFacade::useradmin()){
            if ($request->isMethod('post')) {
                if ($request->has('sectionTitle') && $request->has('questionType') && $request->has('questionTitle')) {
                    $inputTypeArray = ['input' => 1, 'radio' => 2, 'checkbox' => 3, 'contentment' => 4, 'text' => 5];
                    
                    $headerModel = new QHeader;
                    $headerModel->survey_name = $request->input('surveyHeader');
                    $headerModel->instructions = htmlspecialchars($request->input('surveyHeaderDetail'));
                    $headerModel->active = "y";
                    
                    if ($headerModel->save()) {
                        foreach ($request->input('sectionTitle') as $sectionKey => $sectionValue) {
                            $sectionModel = new QSection;
                            $sectionModel->survey_header_id = $headerModel->survey_header_id;
                            $sectionModel->section_title = $sectionValue;
                            $sectionModel->section_required_yn = "n";
                            
                            if ($sectionModel->save()) {
                                foreach ($request->input('questionType')[$sectionKey] as $questionKey => $questionValue) {
                                    $questionModel = new QQuestion;
                                    $questionModel->survey_section_id = $sectionModel->survey_section_id;
                                    $questionModel->input_type_id = $inputTypeArray[$questionValue];
                                    $questionModel->question_name = $request->input('questionTitle')[$sectionKey][$questionKey];
                                    $questionModel->answer_required_yn = "n";
                                    $questionModel->allow_multiple_option_answers_yn = "n";
                                    
                                    if ($questionModel->input_type_id == 4) {
                                        $questionModel->question_range = $request->input('questionRange')[$sectionKey][$questionKey];
                                    }
                                    
                                    if ($questionModel->save()) {
                                        if ($questionModel->input_type_id != 5 && $questionModel->input_type_id != 1) {
                                            foreach ($request->input('choiceTitle')[$sectionKey][$questionKey] as $choiceKey => $choiceValue) {
                                                $choiceModel = new QChoice;
                                                $choiceModel->question_id = $questionModel->question_id;
                                                $choiceModel->option_choice_name = $choiceValue;
                                                $choiceModel->option_choice_type = 'normal';
                                                
                                                if ($request->input('choiceSpecify')[$sectionKey][$questionKey][$choiceKey] == "y") {
                                                    $choiceModel->option_choice_type = 'specify';
                                                }
                                                
                                                $choiceModel->save();
                                            }
                                        } else {
                                            $choiceModel = new QChoice;
                                            $choiceModel->question_id = $questionModel->question_id;
                                            
                                            if ($questionModel->input_type_id == 5) {
                                                $choiceModel->option_choice_name = "text";
                                                $choiceModel->option_choice_type = "normal";
                                            } else {
                                                $choiceModel->option_choice_name = "input";
                                                $choiceModel->option_choice_type = "normal";
                                            }
                                            
                                            $choiceModel->save();
                                        }
                                    }
                                }
                            }
                        }
                        return redirect()->route('questionnaireout')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
                    }
                }
            }
            return view("admin.questionnaireout.questionnaireout-create");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function questionnaireout_insert(Request $request){
        if(AuthFacade::useradmin()){
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
            $survey = new QHeader;
            $survey->fill($survey_header_data);
            $survey->save();
            return redirect()->route('questionnaireout');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function questionnaireout_edit($survey_header_id){
        if(AuthFacade::useradmin()){
            $survey_headers = QHeader::get()->where('survey_header_id',$survey_header_id)->first();
            return view("admin.questionnaireout.questionnaireout-edit",compact('survey_headers'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function questionnaireout_update(Request $request,$survey_header_id){
        if(AuthFacade::useradmin()){
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
            $update_survey = QHeader::where('survey_header_id', $survey_header_id)->first();
            $update_survey->fill($survey_header_data);
            $update_survey->save();
            return redirect()->route('questionnaireout');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function questionnaireout_delete($survey_header_id){
        if(AuthFacade::useradmin()){
            $questionnaireout_delete=[
                'active'=>'n'
            ];
            $update_survey = QHeader::where('survey_header_id', $survey_header_id)->first();
            $update_survey->fill($questionnaireout_delete);
            $update_survey->save();
            return redirect()->route('questionnaireout');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function questionnaireout_exam($id, Request $request){
        if(AuthFacade::useradmin()){
            $survey_headers = QHeader::where('survey_header_id',$id)->first();
            $survey_section = QSection::where('survey_header_id',$survey_headers->survey_header_id)->first();
            $question = QQuestion::where('survey_section_id',$survey_section->survey_section_id)->get();

            if ($request->isMethod('post')) {
                // dd($request->input('Choice'));
                if($request->input('Choice')){
                    foreach ($request->input('Choice') as $ques_id => $choices) {
                        foreach ($choices as $choice){
                            $ques = QChoice::findById($choice);
                            $ans = new Ques_ans;
                            $ans->user_id = Auth::user()->id;
                            $ans->choice_id = $choice;
                            $ans->quest_ans_id = $ques->question_id;
                            $ans->save();
                        }
                    }
                    if($request->input('ChoiceText')){
                        $option = $request->input('Question_type');
                        foreach($option as $op){
                            $ques = QChoice::findById($op);
                            $ans = new Ques_ans;
                            $ans->user_id = Auth::user()->id;
                            $ans->choice_id = $ques->choice_id;
                            foreach($request->input('ChoiceText') as $answer){
                                $ans->answer_textarea = $answer;
                            }
                            $ans->quest_ans_id = $ques->question_id;
                            $ans->save();
                        }
                    }
                }elseif($request->input('ChoiceText')){
                    $option = $request->input('Question_type');
                    $ques = QChoice::findById($option);
                    $ans = new Ques_ans;
                    $ans->user_id = Auth::user()->id;
                    $ans->answer_textarea = $request->input('ChoiceText');
                    $ans->quest_ans_id = $ques->question_id;
                    $ans->save();
                }
                return redirect()->route('index');
            }
            return view("admin.questionnaireout.questionnaireout_exam",compact('survey_headers','survey_section','question'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    //
    //new p
    function question(){
        if(AuthFacade::useradmin()){
            $question= DB::table('question')
            ->join('grouptesting', 'question.group_id', '=', 'grouptesting.group_id')
            ->select('question.*', 'grouptesting.group_title')
            ->paginate(10);
            return view("admin.Question.Question",compact('question'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function question_create(){
        if(AuthFacade::useradmin()){
            $grouptesting = DB::table('grouptesting')
            ->where('active', 'y')
            ->pluck('group_title', 'group_id');

            $question_create = DB::table('question')
                ->join('grouptesting', 'question.group_id', '=', 'grouptesting.group_id')
                ->select('question.*', 'grouptesting.group_title')
                ->get();
            return view("admin.Question.Question_create",compact('question_create','grouptesting'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function question_insert(Request $request){
        if(AuthFacade::useradmin()){
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
                'create_by'=> Auth::user()->id,
                'update_date'=>$date,
                'update_by'=> Auth::user()->id,
                'active'=>'y',
            ];
            DB::table('question')->insert($question_data);
            return redirect('/question');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function question_edit_page($id){
        if(AuthFacade::useradmin()){
            $grouptesting = DB::table('grouptesting')
            ->where('active', 'y')
            ->pluck('group_title', 'group_id');
            $question_edit_page= DB::table('question')
            ->where('ques_id',$id)
            ->first();
            return view("admin.Question.Question_edit_page",compact('grouptesting','question_edit_page'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function question_edit(Request $request,$id){
        if(AuthFacade::useradmin()){
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
                'update_by'=> Auth::user()->id
            ]; 
            DB::table('question')->where('ques_id',$id)->update($question_edit);
            return redirect("/question");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function question_delete($id){
        if(AuthFacade::useradmin()){
            $question_delete=[
                'active'=>'n',
            ];
            DB::table('question')->where('ques_id',$id)->update($question_delete);
            return redirect("/question");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function orgchart(){
        if(AuthFacade::useradmin()){
            $orgchart =DB::table('orgchart')->get();
            return view("admin.orgchart.orgchart",compact('orgchart'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function orgchart_ifram(){
        if(AuthFacade::useradmin()){
            $org = Orgchart::where('active','y')->get();
            return view("admin.orgchart.orgchart_ifram",['org' => $org]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function orgchart_users(Request $request,$id){
        if(AuthFacade::useradmin()){
            $org_id = $id;
            $user = Users::where('status','1')->where('department_id','!=',$org_id)->paginate(10);
            $user_chart = Users::where('status','1')->where('department_id',$org_id)->paginate(10);
            return view("admin.orgchart.orgchart_users",['org_id' => $org_id,'user' => $user,'user_chart' => $user_chart]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function orgchart_unuser(Request $request,$org_id){
        if(AuthFacade::useradmin()){
            if ($request->has('selected_users')) {
                // รับข้อมูลผู้ใช้ที่ถูกเลือกจากฟอร์ม
                $selectedUsers = $request->input('selected_users');
                
                // ดำเนินการต่อไปตามต้องการ เช่น ลบผู้ใช้ หรือทำการปรับปรุงข้อมูลต่าง ๆ
                foreach ($selectedUsers as $userId) {
                    // ทำการลบผู้ใช้หรือดำเนินการอื่น ๆ ตามต้องการ
                    $user = Users::find($userId);
                    if ($user) {
                        $user->department_id = '1'; 
                        $user->save();
                    }
                }
                
                // สามารถทำการ redirect หรือส่งข้อมูลกลับไปยังหน้าอื่นตามต้องการ
                return redirect()->route('orgchart.users',['org_id' => $org_id])->with('success', 'ข้อมูลผู้ใช้ถูกลบเรียบร้อยแล้ว');
            } else {
                // กรณีที่ไม่มีผู้ใช้ถูกเลือก สามารถดำเนินการต่อไปตามต้องการได้
                return redirect()->route('orgchart.users',['org_id' => $org_id])->with('error', 'กรุณาเลือกผู้ใช้ก่อนทำการลบ');
            }
        }else{
            return redirect()->route('login.admin');
        }
    }
    function orgchart_adduser(Request $request,$org_id){
        if(AuthFacade::useradmin()){
            if ($request->has('users')) {
                // รับข้อมูลผู้ใช้ที่ถูกเลือกจากฟอร์ม
                $selectedUsers = $request->input('users');
                
                // ดำเนินการต่อไปตามต้องการ เช่น ลบผู้ใช้ หรือทำการปรับปรุงข้อมูลต่าง ๆ
                foreach ($selectedUsers as $userId) {
                    // ทำการลบผู้ใช้หรือดำเนินการอื่น ๆ ตามต้องการ
                    $user = Users::find($userId);
                    if ($user) {
                        $user->department_id = $org_id; 
                        $user->save();
                    }
                }
                
                // สามารถทำการ redirect หรือส่งข้อมูลกลับไปยังหน้าอื่นตามต้องการ
                return redirect()->route('orgchart.users',['org_id' => $org_id])->with('success', 'ข้อมูลผู้ใช้ถูกลบเรียบร้อยแล้ว');
            } else {
                // กรณีที่ไม่มีผู้ใช้ถูกเลือก สามารถดำเนินการต่อไปตามต้องการได้
                return redirect()->route('orgchart.users',['org_id' => $org_id])->with('error', 'กรุณาเลือกผู้ใช้ก่อนทำการลบ');
            }
        }else{
            return redirect()->route('login.admin');
        }
    }
    function orgchart_unactive(Request $request,$id,$org_id){
        if(AuthFacade::useradmin()){
            if ($request) {
                // dd($id);
                $user = Users::find($id);
                if ($user) {
                    $user->department_id = '1'; 
                    $user->save();
                }
                
                // สามารถทำการ redirect หรือส่งข้อมูลกลับไปยังหน้าอื่นตามต้องการ
                return redirect()->route('orgchart.users',['org_id' => $org_id])->with('success', 'ข้อมูลผู้ใช้ถูกลบเรียบร้อยแล้ว');
            } else {
                // กรณีที่ไม่มีผู้ใช้ถูกเลือก สามารถดำเนินการต่อไปตามต้องการได้
                return redirect()->route('orgchart.users',['org_id' => $org_id])->with('error', 'กรุณาเลือกผู้ใช้ก่อนทำการลบ');
            }
        }else{
            return redirect()->route('login.admin');
        }
    }
    function orgchart_active(Request $request,$id,$org_id){
        if(AuthFacade::useradmin()){
            if ($request) {
                $user = Users::find($id);
                if ($user) {
                    $user->department_id = $org_id; 
                    $user->save();
                }
                
                // สามารถทำการ redirect หรือส่งข้อมูลกลับไปยังหน้าอื่นตามต้องการ
                return redirect()->route('orgchart.users',['org_id' => $org_id])->with('success', 'ข้อมูลผู้ใช้ถูกลบเรียบร้อยแล้ว');
            } else {
                // กรณีที่ไม่มีผู้ใช้ถูกเลือก สามารถดำเนินการต่อไปตามต้องการได้
                return redirect()->route('orgchart.users',['org_id' => $org_id])->with('error', 'กรุณาเลือกผู้ใช้ก่อนทำการลบ');
            }
        }else{
            return redirect()->route('login.admin');
        }
    }
    function orgchart_new(Request $request){
        if(AuthFacade::useradmin()){
            if($request->has('post_value') && $request->has('text') ){
                $res = $request->input('post_value');
                $text = $request->input('text');

                $find_id = Orgchart::findById($request->post_value);
                $org = new Orgchart;
                $org->title = $text;
                $org->parent_id = $res;
                $org->level = $find_id->level + 1;
                $org->active = 'y';
                $org->save();
            }
            return redirect()->route('orgchart');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function orgchart_delete(Request $request){
        if(AuthFacade::useradmin()){
            if($request->has('post_del')){
                $res = $request->input('post_del');
        
                $find_id = Orgchart::findById($res);
                    $find_id->active = 'n';
                    $find_id->save();
                
            }
            return redirect()->route('orgchart');
        }else{
            return redirect()->route('login.admin');
        }
    }

    function orgchart_edit(Request $request){
        if(AuthFacade::useradmin()){
            if($request->has('post_edit')){
                $res = $request->input('post_edit');
                $text = $request->input('text');
        
                $find_id = Orgchart::findById($res);
                $find_id->title = $text;
                $find_id->save();
                
            }
            return redirect()->route('orgchart');
        }else{
            return redirect()->route('login.admin');
        }
    }

    function orgchart_saveorgchart(Request $request){
        if(AuthFacade::useradmin()){
            $allorg = OrgChart::all();
            $chk_org = array();
            foreach ($allorg as $value) {
                $chk_org[] = $value->id;
            }

            if(isset($_POST['post_value'])){
                $chk_org_new = array();
                foreach($_POST['post_value'] as $value){
                    $chk_org_new[] = $value['id'];
                    $model_org = OrgChart::findById($value['id']);
                    // var_dump($_POST['post_value']);
                    // exit();
                    if($value['id']!=1 && $value['parent_id']==""){
                        $parent_value = 1;
                        $level_value = 2;
                    }else{
                        $parent_value = $value['parent_id'];
                        $level_value = $value['level'];
                    }
                    if($model_org){
                        $model_org->title = $value['key'];
                        $model_org->parent_id = $parent_value;
                        $model_org->level = $level_value;
                        $model_org->save();
                    }else{
                        $model = new OrgChart;
                        $model->title = $value['key'];
                        $model->parent_id = $parent_value;
                        $model->level = $level_value;
                        $model->save();
                    }
                }
            }

            $result_org = array_diff($chk_org,$chk_org_new);

            foreach ($result_org as $value) {
                    $model_orgchart = OrgChart::findById($value);
                    $model_orgchart->active = 'n';
                    $model_orgchart->save();
            }

            return route('orgchart'); // การใช้ $this->render('index') จะถูกแทนที่ด้วย return view('index')
        }else{
            return redirect()->route('login.admin');
        }
    }
    function orgchart_control($id){
        if(AuthFacade::useradmin()){
            // dd($id);
            $org = Orgchart::where('id',$id)->first();

            $course = Course::where('active','y')->get();
            return view("admin.orgchart.orgchart_Control",['org' => $org,'course' => $course]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function orgchart_y(Request $request,$id){
        if(AuthFacade::useradmin()){
            // dd($id);
            if($request->has('id')){
                $id = $request->input('id');
                $org_id = $request->input('org_id');

                $org = new Orgcourse;
                $org->orgchart_id = $org_id;
                $org->course_id = $id;
                $org->parent_id = '0';
                $org->active = 'y';
                $org->save();

                return response()->json(['success' => true]);
            }else{
                return response()->json(['error' => true]);
            }
        }else{
            return redirect()->route('login.admin');
        }
    }
    function orgchart_n(Request $request,$id){
        if(AuthFacade::useradmin()){
            // dd($id);
            if($request->has('id')){
                $id = $request->input('id');

                $org = Orgcourse::where('id',$id)->first();
                $org->active = 'n';
                $org->save();

                return response()->json(['success' => true]);
            }else{
                return response()->json(['error' => true]);
            }
        }else{
            return redirect()->route('login.admin');
        }
    }
    function orgchart_create(){
        if(AuthFacade::useradmin()){
            return view("admin.orgchart.orgchart-create");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function orgchart_insert(Request $request){
        if(AuthFacade::useradmin()){
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
        }else{
            return redirect()->route('login.admin');
        }
    }
   
    function orgchart_update(Request $request,$orgchart_id){
        if(AuthFacade::useradmin()){
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
        }else{
            return redirect()->route('login.admin');
        }
    }
    
    //
    function checklecture(){
        if(AuthFacade::useradmin()){
            return view("admin.checklecture.checklecture");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function coursecheck(){
        if(AuthFacade::useradmin()){
            return view("admin.checklecture.checklecture-coursecheck");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function certificate(){
        if(AuthFacade::useradmin()){
            return view("admin.certificate.certificate");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function signnature(){
        if(AuthFacade::useradmin()){
            return view("admin.signnature.signnature");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function usability(){
        if(AuthFacade::useradmin()){
            $usa = Usability::where('active','y')->get();
            return view("admin.usability.usability",['usa' => $usa]);
        }else{
            return redirect()->route('login.admin');
        }
    }

    function usability_detail($id){
        if(AuthFacade::useradmin()){
            $usa = Usability::where('usa_id',$id)->first();
            return view("admin.usability.usability_detail",['usa' => $usa]);
        }else{
            return redirect()->route('login.admin');
        }
    }

    function usability_edit(Request $request,$id){
        if(AuthFacade::useradmin()){
            $usa = Usability::where('usa_id',$id)->first();
            if ($request->isMethod('post')) {
                // dd($request->toArray());
                $validator = Validator::make($request->all(), [
                    'usa_title' => 'required|string' // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                ]);
                
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $usa_update =  Usability::findById($id);
                $usa_update->usa_title = $request->input('usa_title');
                $usa_update->usa_detail = htmlspecialchars($request->input('usa_detail'));

                $usa_update->update_by = Auth::user()->id;

                $usa_update->save();

                
                


                return redirect()->route('usability')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.usability.usability_edit",['usa' => $usa]);
        }else{
            return redirect()->route('login.admin');
        }
    }

    function usability_create(Request $request){
        if(AuthFacade::useradmin()){
            if ($request->isMethod('post')) {
                // dd($request->toArray());
                $validator = Validator::make($request->all(), [
                    'usa_title' => 'required|string' // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                ]);
                
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $usa_update =  new Usability;
                $usa_update->usa_title = $request->input('usa_title');
                $usa_update->usa_detail = htmlspecialchars($request->input('usa_detail'));
                $usa_update->create_by = Auth::user()->id;
                $usa_update->update_by = Auth::user()->id;
                $usa_update->active ='y';
                $usa_update->save();

                
                


                return redirect()->route('usability')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.usability.usability_create");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function usability_delete(Request $request){
        if(AuthFacade::useradmin()){
            if (!$request->has('id')) {
                // คืนค่า JSON แจ้งข้อผิดพลาดว่าไม่มีค่า ID ถูกส่งมา
                return response()->json(['success' => false, 'message' => 'No ID provided'], 400);
            }

            $id = $request->input('id');
            $usability_del=[
                'active'=>'n'
            ];
            $usability = Usability::findById($id);
            $usability->update($usability_del);
            // กรณีที่ไม่มีการส่งค่า id มา
            // คุณสามารถตัดสินใจปฏิเสธคำขอหรือดำเนินการอื่น ๆ ตามที่ต้องการได้
            return response()->json(['success' => true]);
        }else{
            return redirect()->route('login.admin');
        }
    }  
    

    function reportproblem(){
        if(AuthFacade::useradmin()){
            $reportproblem = Reportproblem::paginate(10);
            return view("admin.report.reportproblem",['reportproblem' => $reportproblem]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function reportproblem_edit(Request $request,$id){
        if(AuthFacade::useradmin()){
            $reportproblem = Reportproblem::where('id',$id)->first();
            if($request->isMethod('post')){
                $validator = Validator::make($request->all(), [
                    'answer' => 'required|string' // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                ]);
                
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $report_update = Reportproblem::findById($id);
                $report_update->answer = $request->input('answer');
                $report_update->status = 'success';
                $report_update->accept_report_date = now();
                $report_update->save();

                return redirect()->route('reportproblem')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.report.reportproblem_edit",['reportproblem' => $reportproblem]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function reportproblem_detail($id){
        if(AuthFacade::useradmin()){
            $reportproblem = Reportproblem::where('id',$id)->first();
            return view("admin.report.reportproblem_detail",['reportproblem' => $reportproblem]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function faqtype(){
        if(AuthFacade::useradmin()){
            $faqtype= Faq_type::get();
            return view("admin.faq.faqtype",compact('faqtype'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function faqtype_detail($id){
        if(AuthFacade::useradmin()){
            $faq_type= Faq_type::where('faq_type_id',$id)->first();
            return view("admin.faq.faqtype_detail",['faq_type'=>$faq_type]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function faqtype_create(){
        if(AuthFacade::useradmin()){
            $faqtype_create= Faq_type::get();
            return view("admin.faq.Faqtype_create",compact('faqtype_create'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function faqtype_insert(Request $request){
        if(AuthFacade::useradmin()){
            $request->validate([
                'faq_type_title_TH'=>'required'
            ]);
            $date=new DateTime('Asia/Bangkok');
            $faqtype_data=[
                'faq_type_title_TH'=>$request->faq_type_title_TH,
                'create_date'=>$date,
                'create_by'=> Auth::user()->id,
                'update_date'=>$date,
                'update_by'=> Auth::user()->id,
                'active'=>'y',
            ];
            $faq_type = new Faq_type;
            $faq_type->insert($faqtype_data);
            return redirect('/faqtype');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function faqtype_edit_page($id){
        if(AuthFacade::useradmin()){
            $faqtype_edit_page= Faq_type::where('faq_type_id',$id)
            ->first();
            // dd($faqtype_edit_page);
            return view("admin.faq.Faqtype_edit_page",compact('faqtype_edit_page'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function faqtype_edit(Request $request,$id){
        if(AuthFacade::useradmin()){
            $request->validate([
                'faq_type_title_TH'=>'required',
            ]);
            $date=new DateTime('Asia/Bangkok');
            $faqtype_edit  =[
                'faq_type_title_TH'=>$request->faq_type_title_TH,
                'update_date'=>$date,
                'update_by'=> Auth::user()->id
            ]; 
            $faq_type = Faq_type::where('faq_type_id',$id);

            $faq_type->update($faqtype_edit);
            return redirect("/faqtype");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function faqtype_delete($id){
        if(AuthFacade::useradmin()){
            $faqtype_delete=[
                'active'=>'n',
                'update_by' => Auth::user()->id
            ];
            $faq_type = Faq_type::where('faq_type_id',$id);
            $faq_type->update($faqtype_delete);
            return redirect("/faqtype");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function faq(){
        if(AuthFacade::useradmin()){
            $faq= Faq::join('cms_faq_type', 'cms_faq.faq_type_id', '=', 'cms_faq_type.faq_type_id')
            ->select('cms_faq.*', 'cms_faq_type.faq_type_title_TH')
            ->get();
            return view("admin.faq.faq",compact('faq'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function faq_detail($id){
        if(AuthFacade::useradmin()){
            $faq= Faq::join('cms_faq_type', 'cms_faq.faq_type_id', '=', 'cms_faq_type.faq_type_id')
            ->where('faq_nid_',$id)
            ->first();
            return view("admin.faq.faq_detail",['faq' => $faq]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function faq_create(){
        if(AuthFacade::useradmin()){
            $faq_types = Faq_type::where('active', 'y')
            ->pluck('faq_type_title_TH', 'faq_type_id');
        
            $faq_create = Faq::join('cms_faq_type', 'cms_faq.faq_type_id', '=', 'cms_faq_type.faq_type_id')
                ->select('cms_faq.*', 'cms_faq_type.faq_type_title_TH')
                ->get();

            
            
            return view("admin.faq.Faq_create", compact('faq_create', 'faq_types'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function faq_insert(Request $request){
        if(AuthFacade::useradmin()){
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
                'create_by'=>Auth::user()->id,
                'update_date'=>$date,
                'update_by'=>Auth::user()->id,
                'active'=>'y',
                'sortOrder'=>''
            ];
            $faq = new Faq;
            $faq->insert($faq_data);
            return redirect('/faq');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function faq_edit_page(Request $request,$id){
        if(AuthFacade::useradmin()){
            $faq_edit_page = Faq::where('faq_nid_',$id)->first();
            $faq_types = Faq_type::where('active','y')->get();
            if ($request->isMethod('post')) { // ตรวจสอบว่าเป็นการร้องขอ POST หรือไม่
                
                // dd($request->toArray());
                $validator = Validator::make($request->all(), [
                    'faq_THtopic' => 'required|string', // ตัวอย่างกำหนดเงื่อนไขในการตรวจสอบข้อมูล
                    'faq_THanswer' =>'required|string'

                ]);
                // dd($validator);
                if ($validator->fails()) {
                    
                    return redirect()->back()->withErrors($validator)->withInput(); // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลที่ผู้ใช้ป้อนเพื่อแสดงข้อผิดพลาด
                }

                $faq_update = Faq::findById($id);
                $faq_update->faq_type_id = $request->input('faq_type_id');
                $faq_update->faq_THtopic = $request->input('faq_THtopic');
                $faq_update->faq_THanswer = $request->input('faq_THanswer');
                $faq_update->update_by = Auth::user()->id;
                
                // เพิ่มข้อมูลอื่น ๆ ที่ต้องการอัปเดต
        
                $faq_update->save();
        
                return redirect()->route('faq')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
            }
            return view("admin.faq.Faq_edit_page",compact('faq_edit_page','faq_types'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function faq_edit(Request $request,$id){
        if(AuthFacade::useradmin()){
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
                
                'update_by'=>Auth::user()->id,
            ]; 
            DB::table('cms_faq')->where('faq_nid_',$id)->update($faq_edit);
            return redirect("/faq");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function faq_delete($id){
        if(AuthFacade::useradmin()){
            $faq_delete=[
                'active'=>'n',
            ];
            $faq = Faq::where('faq_nid_',$id);
            $faq->update($faq_delete);
            return redirect("/faq");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function generation(){
        if(AuthFacade::useradmin()){
            $generation= DB::table('org_course')->get();
            return view("admin.Generation.Generation",compact('generation'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function generation_create(){
        if(AuthFacade::useradmin()){
            $generation_create= DB::table('org_course')->get();
            return view("admin.Generation.Generation_create",compact('generation_create'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function generation_insert(Request $request){
        if(AuthFacade::useradmin()){
            $request->validate([
                'orgchart_id'=>'required|numeric',
                'course_id'=>'required|numeric'
            ]);
            $generation_data=[
                'orgchart_id'=>$request->orgchart_id,
                'course_id'=>$request->course_id,
                'parent_id'=>'0',
                'active'=>'y',
            ];
            DB::table('org_course')->insert($generation_data);
            return redirect('/generation');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function generation_edit_page($id){
        if(AuthFacade::useradmin()){
            $generation_edit_page= DB::table('org_course')
            ->where('id',$id)
            ->first();
            return view("admin.Generation.Generation_edit_page",compact('generation_edit_page'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function generation_edit(Request $request,$id){
        if(AuthFacade::useradmin()){
            $request->validate([
                'orgchart_id'=>'required|numeric',
                'course_id'=>'required|numeric'
            ]);
            $generation_edit  =[
                'orgchart_id'=>$request->orgchart_id,
                'course_id'=>$request->course_id,
            ];
            DB::table('org_course')->where('id',$id)->update($generation_edit);
            return redirect("/generation");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function generation_delete($id){
        if(AuthFacade::useradmin()){
            $generation_delete=[
                'active'=>'n',
            ];
            DB::table('org_course')->where('id',$id)->update($generation_delete);
            return redirect("/generation");
        }else{
            return redirect()->route('login.admin');
        }
    }

    //new p
    function adminuser(){
        if(AuthFacade::useradmin()){
            $users = Users::whereNotNull('group_id')
                    ->where('status','1')
                    ->paginate(10);
            return view("admin.adminuser.adminuser",compact('users'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function adminuser_permission_add($id){
        if(AuthFacade::useradmin()){
            $user = Profiles::where('user_id',$id)->first();
            $groupRole = Pgroup::get();
            return view("admin.adminuser.adminuser-permis-add",compact('groupRole','user','id'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function adminuser_permission_insert(Request $request,$id){
        if(AuthFacade::useradmin()){
            $request->validate([
                'group_role' => 'required'
            ]);
            //dd($request);
            $userRole = Users::where('id',$id)->first();
            //dd($userRole);
            if(!$userRole->group)
            {
                $userRole->update(['group_id' => $request->group_role]);
            }else{
                $userRole->group = $request->group_role;
                $userRole->save();
            }
            return redirect()->route('user_admin')->with('success','บันทึกสำเร็จ');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function adminuser_insert(Request $request){
        if(AuthFacade::useradmin()){
            $request->validate([
                'username' => 'required|max:20',
                'password' => 'required|max:32|min:8',
                'email' => 'required|max:39|email',
            ]);
            $date=new DateTime('Asia/Bangkok');
            $adminuser_data=[
                'username'=>$request->username,
                'password'=>$request->password,
                'email'=>$request->email,
                'create_at'=>$date,
                'lastvisit_at'=>$date,
                'last_activity'=>$date,
                'status'=>'1'
            ];
            DB::table('users')->insert($adminuser_data);
            return redirect()->route('adminuser');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function adminuser_edit($id){
        if(AuthFacade::useradmin()){
            $users = DB::table('users')->where('id',$id)->first();
            return view("admin.adminuser.adminuser-edit",compact('users'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function adminuser_update(Request $request,$id){
        if(AuthFacade::useradmin()){
            $request->validate([
                'username' => 'required|max:20',
                'password' => 'required|max:32|min:8',
                'email' => 'required|max:39|email',
            ]);
            $date=new DateTime('Asia/Bangkok');
            $adminuser_data=[
                'username'=>$request->username,
                'password'=>$request->password,
                'email'=>$request->email,
                'lastvisit_at'=>$date,
                'last_activity'=>$date,
                'status'=>'1'
            ];
            DB::table('users')->where('id',$id)->update($adminuser_data);
            return redirect()->route('adminuser');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function adminuser_delete($id){
        if(AuthFacade::useradmin()){
            $adminuser_delete=[
                'status'=>'0'
            ];
            DB::table('users')->where('id',$id)->update($adminuser_delete);
            return redirect()->route('adminuser');
        }else{
            return redirect()->route('login.admin');
        }
    }

    function adminuser_cancle($id){
        if(AuthFacade::useradmin()){
            $adminuser_cancle=[
                'group_id'=> null
            ];
            DB::table('users')->where('id',$id)->update($adminuser_cancle);
            return redirect()->route('adminuser');
        }else{
            return redirect()->route('login.admin');
        }
    }
    //

    // new p
    function pgroup(){
        if(AuthFacade::useradmin()){
            $p_group = Pgroup::where('active','y')->get();
            return view("admin.pgroup.pgroup",compact('p_group'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function pgroup_create(){
        if(AuthFacade::useradmin()){
            $menuHead = AdminMenu::whereNull('parent_id')->get();
            // $menuList = AdminMenu::whereNotNull('parent_id')->get();
            // dd($menuHead);
            return view("admin.pgroup.pgroup-create",compact('menuHead'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function pgroup_insert(Request $request){
        if(AuthFacade::useradmin()){
            $request->validate([
                'group_name' => 'required|max:17',

            ]);
            $pgroup_data=[
                'group_name'=>$request->group_name,
                'create_by'=>'1',               //default
                'update_by'=>'1',               //default
                'active'=>'y'                   //default
            ];
            $p_group = new Pgroup();
            $p_group->fill($pgroup_data);
            $p_group->save();
            if($p_group->save()){
                $group_id =  $p_group->id;
            }
    
            // Retrieve the selected menu IDs from the form
            $selected_menus = $request->input('menu');
        
            // Loop through the selected menu IDs and insert them into the tbl_permission table
            foreach ($selected_menus as $menu_id) {
                //$menu = AdminMenu::find($menu_id); // ดึงข้อมูลเมนูโดยใช้ $menu_id
                $permission = new Permission();
                $permission->group_id = $group_id;
                $permission->group_parent_id = $menu_id; // เริ่มต้นให้ใช้ admin_menu_id เป็นเมนูย่อยที่เลือก
                // $permission->group_parent_id = $menu->parent_id;
        
                $permission->save();
            }
            return redirect()->route('pgroup');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function pgroup_edit($pgroup_id){
        if(AuthFacade::useradmin()){
            $group_id = Pgroup::get()->where('id',$pgroup_id)->first();
            $menuHead = AdminMenu::whereNull('parent_id')->get();
            $checkMenu = Permission::where('group_id',$pgroup_id)->where('active',1)->get();
            foreach ($checkMenu as $data)
            {
                $checked[] = $data->group_parent_id;
            }

            return view("admin.pgroup.pgroup-edit",compact('group_id','menuHead','checked'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function pgroup_update(Request $request,$pgroup_id){
        if(AuthFacade::useradmin()){
            $selected_menus = $request->input('menu');
            $all_menus = $request->input('checkMenu');
            foreach ($all_menus as $menu) {
                // ตรวจสอบว่า $menu อยู่ใน $selected_menus หรือไม่
                if (in_array($menu, $selected_menus)) {
                    // หากมีใน $selected_menus ให้ดำเนินการตามเงื่อนไข
                    // เช่น ตรวจสอบในฐานข้อมูล และดำเนินการตามเงื่อนไขที่ต้องการ
                    // เรียกใช้ Model เพื่อตรวจสอบว่ามีข้อมูลในฐานข้อมูลหรือไม่
                    $existing_menu = Permission::where('group_id', $pgroup_id)->where('group_parent_id', $menu)->first();

                    if ($existing_menu) {
                        // ตรวจสอบว่า active เป็น 0 หรือไม่
                        if ($existing_menu->active == 0) {
                            // เปลี่ยนค่า active เป็น 1
                            $existing_menu->active = 1;
                            $existing_menu->save(); // บันทึกการเปลี่ยนแปลง
                        }
                    } else {
                        // หากไม่มีในฐานข้อมูลให้ทำการเพิ่มข้อมูลใหม่
                        Permission::create([
                            'group_id' => $pgroup_id,
                            'group_parent_id' => $menu,
                            'active' => 1, // กำหนดค่า active เป็น 1
                        ]);
                    }
                }
            }

            // สำหรับการตรวจสอบและดำเนินการตามเงื่อนไขใน array ที่มีข้อมูลไม่เหมือนกัน
            foreach ($all_menus as $menu) {
                if (!in_array($menu, $selected_menus)) {
                    // ดำเนินการตามเงื่อนไขต่อไป
                    $existing_menu = Permission::where('group_id', $pgroup_id)->where('group_parent_id', $menu)->first();

                    if ($existing_menu) {
                        // ตรวจสอบว่า active เป็น 1 หรือไม่
                        if ($existing_menu->active == 1) {
                            // เปลี่ยนค่า active เป็น 0
                            $existing_menu->active = 0;
                            $existing_menu->save(); // บันทึกการเปลี่ยนแปลง
                        }
                    }
                }
            }
            return redirect()->route('pgroup');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function pgroup_delete($pgroup_id){
        if(AuthFacade::useradmin()){
            $pgroup_delete=[
                'active'=>'n'
            ];
            $update_pgroup = Pgroup::findById($pgroup_id);
            $update_pgroup->update($pgroup_delete);
            return redirect()->route('pgroup');
        }else{
            return redirect()->route('login.admin');
        }
    }
    //

    function user_admin(Request $request){
        if(AuthFacade::useradmin()){
                $company = Company::get();
                $division = Division::get();
                $course_name = $request->input('fname');
                $division_s = $request->input('division');
                $company_s = $request->input('company');
                if(isset($course_name) && !empty($course_name)) {
                    $query = Users::where('username','like',"%$course_name%")
                ->where('status', '1')
                ->where('del_status', 0)
                ->paginate(10);
                // dd($course_name);
                // dd($query);
                }elseif(isset($division_s) && !empty($division_s)){
                    $query = Users::where('division_id',$division_s)
                    ->where('status', '1')
                    ->where('del_status', 0)
                    ->paginate(10);
    
                } elseif(isset($company_s) && !empty($company_s)){
                    $query = Users::where('company_id',$company_s)
                ->where('status', '1')
                ->where('del_status', 0)
                ->paginate(10);
    
                }else {
                    $query = Users::where('status', '1')
                ->where('del_status', 0)
                ->paginate(10);
                }
                // dd($query->toArray());
            return view("admin.user_admin.user-admin",['company' => $company,'division' => $division,'query' => $query]);
        }else{
            return redirect()->route('login.admin');
        }
    }

    function userAdminView($id){
        if(AuthFacade::useradmin()){
            $query = Users::with('Profiles')
                ->where('id', $id)->first();
            return view("admin.user_admin.user-admin-view", compact('query'));
        }else{
            return redirect()->route('login.admin');
        }
    }

    function userAdminCreate(){
        if(AuthFacade::useradmin()){
            $profTitle = ProfilesTitle::get();
            $company = Company::get();

            return view("admin.user_admin.user-admin-create", compact('profTitle', 'company'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    public function userAdminEdit($id){
        if(AuthFacade::useradmin()){
            $user = Users::where('id',$id)->first();
            $profTitle = ProfilesTitle::get();
            $company = Company::get();

            return view('admin.user_admin.user-admin-edit',compact('user','profTitle','company'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    public function userAdminInsert(Request $request){
        if(AuthFacade::useradmin()){
            $request->validate([
                'username' => 'required',
                'password' => 'required|min:8',
                'firstname' => 'required',
                'lastname' => 'required',
                'identification' => 'required|min:13|max:13'
            ]);
            $user = new Users();
            $user->username = $request->username;
            $user->password = md5($request->password);
            $user->email = $request->email ?? null;
            $user->company_id = $request->company ?? null;
            $user->division_id = $request->division ?? null;
            $user->position_id = $request->position ?? null;
            $user->activkey = md5(microtime().$request->password);
            $user->create_at = now()->format('Y-m-d H:i:s');
            $user->_token = $request->_token;
            $user->save();
            // dd($user->toArray());

            $profile = new Profiles();
            $profile->user_id = $user->id;
            $profile->title_id = $request->title ?? null;
            $profile->firstname = $request->firstname;
            $profile->lastname = $request->lastname;
            $profile->identification = $request->identification;
            $profile->phone = $request->phone ?? null;
            $profile->firstname_en = $request->firstname_en ?? null;
            $profile->lastname_en = $request->lastname_en ?? null;
            $profile->save();

            return redirect()->route('user_admin')->with('success','Register Successful');
        }else{
            return redirect()->route('login.admin');
        }
    }

    public function userAdminUpdate(Request $request){
        if(AuthFacade::useradmin()){
            $user = Users::where('id',$request->id)->first();
            $user->password = md5($request->password);
            $user->email = $request->email ?? null;
            $user->company_id = $request->company ?? null;
            $user->division_id = $request->division ?? null;
            $user->position_id = $request->position ?? null;
            $user->save();

            $profile = Profiles::where('user_id',$request->id)->first();
            $profile->user_id = $user->id;
            $profile->title_id = $request->title ?? null;
            $profile->firstname = $request->firstname;
            $profile->lastname = $request->lastname;
            $profile->identification = $request->identification;
            $profile->phone = $request->phone ?? null;
            $profile->firstname_en = $request->firstname_en ?? null;
            $profile->lastname_en = $request->lastname_en ?? null;
            $profile->save();

            return redirect()->route('user_admin')->with('success','Update Successful');
        }else{
            return redirect()->route('login.admin');
        }
    }
    public function userAdminDelete($id){
        if(AuthFacade::useradmin()){
            $userDelete = Users::where('id',$id)->first();
            $userDelete->del_status = 1;
            $userDelete->save();
            return redirect()->route('user_admin')->with('success','Delete Successful');
        }else{
            return redirect()->route('login.admin');
        }
    }
    //************************* */ import user by chockekr
    public function userExcel(){
        if(AuthFacade::useradmin()){
            return view("admin.user_admin.user-excel");
        }else{
            return redirect()->route('login.admin');
        }
    }

    public function importExcel(Request $request){
        if(AuthFacade::useradmin()){
            $request->validate([
                'import_excel' =>
                ['required','file','mimes:xlsx, xls'],
                [
                    'import_excel.required' => 'คุณยังไม่ได้ Uploadfile',
                    'import_excel.mimes' => 'กรุณาใช้ไฟล์สกุล xlsx xls'
                ]


            ]);
            // dd( $request->file('import_excel'));
            Excel::import(new UsersImport, $request->file('import_excel'));
            
            return redirect()->back()->with('success', 'Excel imported successfully!');
        }else{
            return redirect()->route('login.admin');
        }
    }
    //************************** */
    function coursefield(){
        if(AuthFacade::useradmin()){
            return view("admin.coursefield.coursefield");
        }else{
            return redirect()->route('login.admin');
        }
    }
    //new p
    function imgslide_create(){
        if(AuthFacade::useradmin()){
            return view("admin.imgslide.Imgslide-create");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function imgslide_insert(Request $request){
        if(AuthFacade::useradmin()){
            $request->validate([
                'imgslide_link'=>'required|url|max:76',
                'imgslide_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
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
            // $request->imgslide_picture->move(public_path('storage/Imgslides'),$imageName);

                $idFolder = public_path('images/uploads/imgslides');
                if (!file_exists($idFolder)) {
                    mkdir($idFolder);
                }
                
            $request->imgslide_picture->move($idFolder,$imageName); 
            return redirect()->route('imgslide');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function imgslide(){
        if(AuthFacade::useradmin()){
            $imgslide =DB::table('imgslide')->get();
            return view("admin.imgslide.imgslide",compact('imgslide'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function imgslide_detail($id){
        if(AuthFacade::useradmin()){
            $imgslide =Imgslide::where('imgslide_id',$id)->first();
            return view("admin.imgslide.imgslide_detail",['imgslide'=>$imgslide]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function imgslide_edit($imgslide_id){
        if(AuthFacade::useradmin()){
            $imgslide =DB::table('imgslide')->where('imgslide_id',$imgslide_id)->first();
            return view("admin.imgslide.Imgslide-edit",compact('imgslide'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function imgslide_update(Request $request,$imgslide_id){
        if(AuthFacade::useradmin()){
            $request->validate([
                'imgslide_link'=>'required|url|max:76',
                'imgslide_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            
            $imgslide_data=[
                'imgslide_link'=>$request->imgslide_link,
                'update_by'=>Auth::user()->id,               //default                  //default
            ];
            $imgslide_update = Imgslide::findById($imgslide_id);
            $imgslide_update->update($imgslide_data);
            if($request->file('imgslide_picture')){
                $image = $request->file('imgslide_picture');

                $idFolder = public_path('images/uploads/imgslides');
                if (!file_exists($idFolder)) {
                    mkdir($idFolder);
                }

                // ย้ายไฟล์ภาพไปยังโฟลเดอร์ใหม่
                $imageName = $image->getClientOriginalName();
                $image->move($idFolder, $imageName);

                $imgslide_update->imgslide_picture = $imageName;
                // dd($imageName);
                
            } 
            $imgslide_update->save();
            return redirect()->route('imgslide');
        }else{
            return redirect()->route('login.admin');
        }
    }
    function imgslide_delete($imgslide_id){
        if(AuthFacade::useradmin()){
            $imgslide_delete=[
                'active'=>'n'
            ];
            DB::table('imgslide')->where('imgslide_id',$imgslide_id)->update($imgslide_delete);
            return redirect()->route('imgslide');
        }else{
            return redirect()->route('login.admin');
        }
    }
    //
    function librarytype(){
        if(AuthFacade::useradmin()){
            return view("admin.libraryfile.librarytype");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function libraryfile(){
        if(AuthFacade::useradmin()){
            return view("admin.libraryfile.libraryfile");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function coursenotification(){
        if(AuthFacade::useradmin()){
            $course_notification = Coursenotification::where('active','1')->paginate(10);
            return view("admin.coursenotification.coursenotification",['course_notification' => $course_notification]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function passcourse(){
        if(AuthFacade::useradmin()){
            return view("admin.passcourse.passcourse");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function logadmin(){
        if(AuthFacade::useradmin()){
            $logadmin = Logadmin::join('tbl_users','tbl_users.id','=','log_admin.user_id')->paginate(10);
            return view("admin.logadmin.logadmin",['logadmin' => $logadmin]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function logusers(){
        if(AuthFacade::useradmin()){
            $logusers = Logusers::join('tbl_users','tbl_users.id','=','log_users.user_id')->paginate(10);
            return view("admin.logadmin.logadmin_user",['logusers' => $logusers]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function logapprove(){
        if(AuthFacade::useradmin()){
            $logapprove = Logapprove::join('users','users.id','=','log_approve.user_id')->paginate(10);
            return view("admin.logadmin.logadmin_apporve",['logapprove' => $logapprove]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function logapporvepersonal(){
        if(AuthFacade::useradmin()){
            $logapporvepersonal = Logapprovepersonal::join('users','users.id','=','log_approve_personal.user_id')->paginate(10);
            return view("admin.logadmin.logadmin_apporvepersonal",['logapporvepersonal' => $logapporvepersonal]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function logregister(){
        if(AuthFacade::useradmin()){
            $logregister = Logregister::join('users','users.id','=','log_register.user_id')->paginate(10);
            return view("admin.logadmin.logadmin_register",['logregister' => $logregister]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function student_photo(){
        if(AuthFacade::useradmin()){
            return view("admin.student-photo.student-photo");
        }else{
            return redirect()->route('login.admin');
        }
    }
    function capture(){
        if(AuthFacade::useradmin()){
            return view("admin.capture.capture");
        }else{
            return redirect()->route('login.admin');
        }
    }

    function learnreset(){
        if(AuthFacade::useradmin()){
            $users = Users::join('profiles','profiles.user_id','=','users.id')->where('users.del_status','0')->paginate(10);
            // $score =Score::where('active','y')->paginate(10);
            // $learnreset =DB::table('score')->get();
            return view("admin.learnreset.learnreset",compact('users'));
        }else{
            return redirect()->route('login.admin');
        }
    }
    function learnreset_course(Request $request,$id){
        if(AuthFacade::useradmin()){
            $learn = Learn::where('user_id',$id)->where('lesson_active','y')->get();
            if ($request->has('chk')) {
                // รับค่าที่ส่งมาจากฟอร์ม
                $inputData = $request->input('inputData');
                // dd($inputData);
                $chkValues = $request->input('chk');

                foreach ($chkValues as $chkValue) {
                    $reset = Learn::findById($chkValue);
                    if($reset){
                        $reset->lesson_active = 'n';
                        $reset->save();

                        $log_reset = new Logreset;
                        $log_reset->user_id = $reset->user_id;
                        $log_reset->course_id = $reset->course_id;
                        $log_reset->lesson_id = $reset->lesson_id;
                        $log_reset->reset_description = $inputData;
                        $log_reset->reset_type = '0';
                        $log_reset->reset_by = Auth::user()->id;
                        $log_reset->reset_date = now();
                        $log_reset->save();
                    }
                }
                return redirect()->route('learnreset.course',['id' => $id]);
            }
            return view("admin.learnreset.learnreset_course",['learn' => $learn,'id' => $id]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function learnreset_score(Request $request,$id){
        if(AuthFacade::useradmin()){
            $score = Score::where('user_id',$id)->where('active','y')->get();
            if ($request->has('chk')) {
                // รับค่าที่ส่งมาจากฟอร์ม

                $chkValues = $request->input('chk');

                foreach ($chkValues as $chkValue) {
                    $reset = Score::findById($chkValue);
                    $reset->active = 'n';
                    $reset->save();
                    
                }
                return redirect()->route('learnreset.score',['id' => $id]);
            }
            return view("admin.learnreset.learnreset_score",['score' => $score,'id' => $id]);
        }else{
            return redirect()->route('login.admin');
        }
    }
    function learnreset_reset(Request $request,$id){
        if(AuthFacade::useradmin()){
            if ($request->has('checkbox_name')) {
                $checkboxValue = $request->input('checkbox_name');
                // dd($checkboxValue);
                if (!empty($checkboxValue)) {
                    foreach($checkboxValue as $re){
                        $score = Score::findById($re);
        
                        $score->active = 'n';
                        $score->save();
                    }
                    return redirect()->route('learnreset');
                }
            } 
            if ($request->has('checkbox_name_course')) {
                $checkboxValue = $request->input('checkbox_name_course');
                // dd($checkboxValue);
                if (!empty($checkboxValue)) {
                    foreach($checkboxValue as $re){
                        $score = Learn::findById($re);
        
                        $score->lesson_active = 'n';
                        $score->save();
                    }
                    return redirect()->route('learnreset');
                }
            } 
            if ($request->has('checkbox_name_lesson')) {
                $checkboxValue = $request->input('checkbox_name_lesson');
                // dd($checkboxValue);
                if (!empty($checkboxValue)) {
                    foreach($checkboxValue as $re){
                        $score = Learn::findById($re);
        
                        $score->lesson_active = 'n';
                        $score->save();
                    }
                    return redirect()->route('learnreset');
                }
            } 
            return redirect()->route('learnreset');
        }else{
            return redirect()->route('login.admin');
        }   
    }
    function learnreset_resetuser_insert(Request $request){
        if(AuthFacade::useradmin()){
            $currentTime = Carbon::now('Asia/Bangkok')->toDateTimeString();
            $data = [
                'user_id'=>$request->user_id,
                'lesson_id'=>$request->lesson_id,
                'create_date' => $currentTime,
                'reset_description'=>'resetuser',
                'create_by'=>'1',
                'update_date' => $currentTime,
                'update_by'=>'1',

                // ใส่ข้อมูลที่ต้องการ insert ให้ครบ
            ];

            // DB::table('log_reset1')->insert($data);
            // dd($data);
            $dataupdate = [
                'user_id'=>$request->user_id,
                'score_total'=>'0',
                'score_number'=>'0',
                'update_date' => $currentTime,
                'update_by'=>$request->user_id

                // ใส่ข้อมูลที่ต้องการ insert ให้ครบ
            ];
            DB::table('score')
            ->where('user_id',$request->user_id)
            ->where('lesson_id',$request->lesson_id)
            ->update($dataupdate);
            return redirect('/learnreset_resetuser');
        }else{
            return redirect()->route('login.admin');
        } 
    }
//classroom
    function classroom(){
        if(AuthFacade::useradmin()){
            $zoom =DB::table('zoom')->get();
            return view("admin.Classroom.Classroom",compact('zoom'));
        }else{
            return redirect()->route('login.admin');
        } 
    }
    function classroom_create(Request $request){
        if(AuthFacade::useradmin()){
            
            return view("admin.Classroom.classroom-create",compact('zoom'));
        }else{
            return redirect()->route('login.admin');
        } 
    }
    function classroom_edit($id){
        if(AuthFacade::useradmin()){
            $zoom=DB::table('zoom')->where('id',$id)->first();
            return view("admin.Classroom.classroom-update",compact('zoom'));
        }else{
            return redirect()->route('login.admin');
        } 
    }
    function classroom_delete($id) {
        if(AuthFacade::useradmin()){
            $classroom_delete = [
                'active' => 'n',
            ];
            DB::table('zoom')->where('id', $id)->update($classroom_delete);
            return redirect()->route('classroom')->with('success', 'Classroom deleted successfully.');
        }else{
            return redirect()->route('login.admin');
        } 
    }
    function classroom_update(Request $request){
        if(AuthFacade::useradmin()){
            $currentTime = Carbon::now('Asia/Bangkok')->toDateTimeString();;
            $dataupdate = [
                'title'=>$request->title,
                'join_url'=>$request->join_url,
                'start_date'=>$request->start_date,
                'updated_date' => $currentTime,
                'updated_by'=>"1"
            ];
            DB::table('zoom')
            ->where('id',$request->id)
            ->update($dataupdate);
            return redirect()->route('classroom');
        }else{
            return redirect()->route('login.admin');
        } 
    }
    //Captcha
    function captcha_create(){
        if(AuthFacade::useradmin()){
            return view("admin.captcha.captcha-create");
        }else{
            return redirect()->route('login.admin');
        } 
    }
    function captcha(){
        if(AuthFacade::useradmin()){
            // อัปเดตเป็นชื่อตารางที่ถูกต้อง 'config_captcha'
            $captcha = Captcha::where('capt_active','y')->paginate(10);
            $courseOnline = Course::where('active','y')->get();
            return view("admin.captcha.captcha_2",compact('captcha','courseOnline'));
        }else{
            return redirect()->route('login.admin');
        } 
    }
    function captcha_edit($capid){
        if(AuthFacade::useradmin()){
            $captcha = Captcha::get()->where('capid',$capid)->first();
            return view("admin.captcha.captcha-edit",compact('captcha'));
        }else{
            return redirect()->route('login.admin');
        } 
    }
    function captcha_update(Request $request,$capid){
        if(AuthFacade::useradmin()){
            $currentTime = Carbon::now('Asia/Bangkok')->toDateTimeString();
            $captcha_data=[
                'capt_name'=>$request->capt_name,
                'type'=>$request->type,
                'capt_times'=>$request->capt_times,
                'updated_by'=>'1',
                'updated_date'=>$currentTime               //default
            ];
            $update_captcha = Captcha::where('capid', $capid)->first();
            $update_captcha->fill($captcha_data);
            $update_captcha->save();
            return redirect()->route('captcha');
        }else{
            return redirect()->route('login.admin');
        } 
    }
    function captcha_insert(Request $request){
        if(AuthFacade::useradmin()){
            $currentTime = Carbon::now('Asia/Bangkok')->toDateTimeString();
            $captcha_data=[
                'capt_name'=>$request->capt_name,
                'type'=>$request->type,
                'capt_times'=>$request->capt_times,
                'capt_time_random'=>'10',
                'capt_time_back'=>'10',
                'capt_wait_time'=>'10',
                'capt_hide'=>'1',
                'capt_active'=>'y',
                'created_by'=>'1',
                'updated_by'=>'1',
                'slide'=>'10',
                'prev_slide'=>'999',
                'domain_id'=>'35',
                'capt_time_random2'=>'2',
                'capt_time_random3'=>'3',
                'created_date'=> $currentTime ,
                'updated_date'=>$currentTime
            ];
            $survey = new Captcha;
            $survey->fill($captcha_data);
            $survey->save();
            return redirect()->route('captcha');
        }else{
            return redirect()->route('login.admin');
        } 
    }
    function captcha_delete(Request $request,$capid) {
        if(AuthFacade::useradmin()){
            $currentTime = Carbon::now('Asia/Bangkok')->toDateTimeString();
            if ($request->has('capt_active') ) {
                $captcha_delete = [
                    'capt_active' => 'y',
                    'updated_at' => $currentTime,
                    'created_at'=>"1"
                ];
                $captcha_survey = Captcha::where(['capid'=>$request->capid])->first();
                $captcha_survey->fill($Captcha_delete);
                $captcha_survey->save();
                return redirect()->route('captcha');
            }
            else {
                $captcha_delete = [
                    'capt_active' => 'n',
                    'updated_at' => $currentTime,
                    'created_at'=>"1"
                ];
                $captcha_survey  = Captcha::where(['capid'=>$request->capid])->first();
                $captcha_survey->fill($captcha_delete);
                $captcha_survey->save();
                return redirect()->route('captcha');
            }
        }else{
            return redirect()->route('login.admin');
        } 
    }
    function report_logallregister(Request $request) {
        if(AuthFacade::useradmin()){
            $query = $request->input('fname');
            $position = $request->input('position');

            if($query) {
                $report = Logregister::where(function($q) use ($query) {
                    $q->where('firstname', 'like', "%$query%")
                    ->orWhere('lastname', 'like', "%$query%");
                })->where('active', 'y')->get();
            } elseif(isset($position) && !empty($position)) {
                $report = Logregister::where('position_id', $position)->get();
            } else {
                $report = Logregister::where('active', 'y')->get();
            }

            return view("admin.report.report_logallregister", ['report' => $report]);
        }else{
            return redirect()->route('login.admin');
        } 
    }
    function report_loguserstatus(Request $request) {
        if(AuthFacade::useradmin()){
            $query = $request->input('fname');
            $email = $request->input('email');
            
            if($query && !empty($query)) {
                $user = Users::join('profiles', 'profiles.user_id', '=', 'users.id')
                            ->where(function($q) use ($query) {
                                $q->where('profiles.firstname', 'like', "%$query%")
                                    ->orWhere('profiles.lastname', 'like', "%$query%")
                                    ->orWhere('profiles.firstname_en', 'like', "%$query%")
                                    ->orWhere('profiles.lastname_en', 'like', "%$query%");
                            })
                            ->where('status', '1')
                            ->where('superuser', '0')
                            ->orderBy('id','DESC')
                            ->paginate(10);
            } elseif(isset($email) && !empty($email)) {
                $user = Users::join('profiles', 'profiles.user_id', '=', 'users.id')
                            ->where('users.email', '=', $email)
                            ->where('status', '1')
                            ->where('superuser', '0')
                            ->orderBy('id','DESC')
                            ->paginate(10);
            }  else {
                $user = Users::join('profiles', 'profiles.user_id', '=', 'users.id')
                            ->where('status', '1')
                            ->where('superuser', '0')
                            ->orderBy('id','DESC')
                            ->paginate(10);
            }
            
            return view("admin.report.report_loguserstatus", ['user' => $user]);
        }else{
            return redirect()->route('login.admin');
        } 
    }
    function report_course(Request $request) {
        if(AuthFacade::useradmin()){
            // $query = $request->input('cate');
            $course_name = $request->input('course_name');

            if(isset($course_name) && !empty($course_name)) {
                $course = Course::where('course_id',$course_name)
                            ->where('active', 'y')
                            ->orderBy('course_id', 'DESC')
                            ->paginate(10);
            } else {
                $course = Course::where('active', 'y')
                            ->orderBy('course_id', 'DESC')
                            ->paginate(10);
            }

            return view("admin.report.report_course", ['course' => $course]);
        }else{
            return redirect()->route('login.admin');
        } 
    }
    function report_reset(Request $request) {
        if(AuthFacade::useradmin()){
            // $query = $request->input('cate');
            $course_name = $request->input('course_name');
            $lesson_name = $request->input('lesson_name');

            if(isset($course_name) && !empty($course_name)) {
                $reset = Logreset::where('course_id',$course_name)
                            ->paginate(10);
            }elseif(isset($lesson_name) && !empty($lesson_name)) {
                $reset = Logreset::where('lesson_id',$lesson_name)
                            ->paginate(10);
            }else {
                $reset = Logreset::paginate(10);
            }

            return view("admin.report.report_logreset", ['reset' => $reset]);
        }else{
            return redirect()->route('login.admin');
        } 
    }
    function report_byuser(Request $request) {
        if(AuthFacade::useradmin()){
            // $query = $request->input('cate');
            $company = Company::get();
            $division = Division::get();
            $course_name = $request->input('fnam');
            $division_s = $request->input('division');
            $company_s = $request->input('company');
            if(isset($course_name) && !empty($course_name)) {
                $user = Users::where('username',$course_name)
                            ->where('status', '1')
                            ->orderBy('id', 'DESC')
                            ->paginate(10);
            }elseif(isset($division_s) && !empty($division_s)){
                $user = Users::where('division_id',$division_s)
                            ->where('status', '1')
                            ->orderBy('id', 'DESC')
                            ->paginate(10);

            } elseif(isset($company_s) && !empty($company_s)){
                $user = Users::where('company_id',$company_s)
                            ->where('status', '1')
                            ->orderBy('id', 'DESC')
                            ->paginate(10);

            }else {
                $user = Users::where('status', '1')
                            ->orderBy('id', 'DESC')
                            ->paginate(10);
            }

            return view("admin.report.report_byuser", ['user' => $user,'company' => $company,'division' => $division]);
        }else{
            return redirect()->route('login.admin');
        } 
    }
    public function fetchCoursesAndLessons(Request $request){
        if(AuthFacade::useradmin()){
            $user_id = $request->input('user_id');

            // ดึงข้อมูลการเรียนของผู้ใช้จากตาราง learn
            $learn = Learn::select('course_id')->where('user_id', $user_id)->distinct()->get();


            $courses = [];
            $lessons = [];

            // ดึงข้อมูลหลักสูตรและบทเรียนที่เกี่ยวข้อง
            foreach ($learns as $learn) {
                // ดึงข้อมูลหลักสูตรจากตาราง Course ด้วย course_id ที่ได้จากการเรียน
                $course = Course::find($learn->course_id);

                if ($course) {
                    // เพิ่มข้อมูลหลักสูตรในรายการ
                    $courses[] = [
                        'course_id' => $course->course_id,
                        'course_title' => $course->course_title,
                    ];

                    // ดึงข้อมูลบทเรียนที่เกี่ยวข้องกับหลักสูตร
                    $courseLessons = Lesson::where('course_id', $course->course_id)->get();

                    // เพิ่มข้อมูลบทเรียนในรายการ
                    $lessons[$course->id] = $courseLessons->map(function ($lesson) {
                        return [
                            'lesson_id' => $lesson->id,
                            'lesson_title' => $lesson->title,
                        ];
                    });
                }
            }

        // ส่งข้อมูลกลับเป็น JSON
            return response()->json([
                'success' => true,
                'courses' => $courses,
                'lessons' => $lessons,
                'user_id' => $user_id,
            ]);
        }else{
            return redirect()->route('login.admin');
        } 
    }
    //dynamic dropdown company by chockker 
    public function companySelector($id){
        if(AuthFacade::useradmin()){
            $position = Position::where('company_id', $id)->get();
            $division = Division::where('company_id', $id)->get();
            return response()->json([
                'position' => $position,
                'division' => $division
            ]);
        }else{
            return redirect()->route('login.admin');
        } 
    }
}
