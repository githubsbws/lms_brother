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
    }
    function faq(){
        return view("admin\faq\faq");
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

