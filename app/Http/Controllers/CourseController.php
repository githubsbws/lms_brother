<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Manage;
use App\Models\Question;
use App\Models\FileDoc;
use App\Models\Learn;
use App\Models\LearnFile;
use App\Models\Orgchart;
use App\Models\Orgcourse;
use App\Models\File;
use App\Models\Grouptesting;
use Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    // Detail
    function courseDetail($id)
    {
    if(Auth::check()){
        $course_detail = Course::findById($id);
        $course_lesson = Lesson::where(['course_id' => $course_detail->course_id,'active' => 'y'])->first();
        if($course_lesson != null){
            return view("course.course-detail",['course_detail' =>$course_detail],['course_lesson' =>$course_lesson]);  
        }else{
            return redirect()->route('index');
        }
    }else{
        return redirect()->route('index');
    }
    //    dd($course_detail);
    }

    // Lession
    function courseLesson($course_id,$id, Request $request){
        $domain = '15';
        if(Auth::check()){
        $ptest = Manage::where(['type' => 'pre','id' => $id,'active' =>'y'])->first();
        if($ptest){
            return redirect()->route("course.coursequestion",['course_id' =>$course_id,'id'=>$id]);
        }
        $learnModel = Learn::where(['lesson_id' => $id,'user_id' => Auth::user()->id])->first();
        if(!$learnModel){
            $learnLog = new Learn;
            $learnLog->user_id = Auth::user()->id;
            $learnLog->gen_id = '0';
            $learnLog->lesson_id = $id;
            $learnLog->course_id = $course_id;
            $learnLog->learn_date = now();
            $learnLog->create_date = now();
            $learnLog->domain_id = $domain;
            $learnLog->save();
            $learn_id = $learnLog->learn_id;
            
        }
        else
        {
            // $learnModel->update([
            //     'learn_date' => now()
            // ]);
            $learn = Learn::findById($learnModel->learn_id);
            $learn->fill([
                'learn_date' => now()
            ]);
            $learn->save();
            $learn_id = $learnModel->learn_id;
        }
        $course_detail = Course::findById($course_id);
        $lesson_list = Lesson::where(['course_id' => $course_id,'active' =>'y'])->get();
        $file = FileDoc::where(['lesson_id' => $id,'active' =>'y'])->get();
        if(isset($id)){
            $course_lesson = Lesson::join('course_online','course_online.course_id','=','lesson.course_id')->where('lesson.id',$id)->get();
            $file_id = File::where('lesson_id',$id)->first();
            
        }
        return view("course.course-lesson",['course_lesson' =>$course_lesson,'course_detail' =>$course_detail,'lesson_list' =>$lesson_list,'file' =>$file,'course_id' =>$course_id,'lesson_id' =>$id,'learn_id' =>$learn_id,'file_id' =>$file_id]);
    }else{
        return redirect()->route('index');
    }
}
    
    // course
    function course()
    {
        if(Auth::check()){
        $org_chart_ids = Orgchart::where('active', 'y')->pluck('id');

        $orgcourse = Orgcourse::whereIn('orgchart_id', $org_chart_ids)->where('active', 'y')->pluck('course_id');

        $course_detail = Course::join('category','category.cate_id','=','course_online.cate_id')->whereIn('course_id',$orgcourse)->where('course_online.active','y')->orderBy('course_id', 'desc')->paginate(6);
        return view("course.course",['course_detail' =>$course_detail]);
    }else{
        return redirect()->route('index');
    }
    }
    function LearnVdo($id,$learn_id,$counter, Request $request)
    {
        $learnVdoModel = LearnFile::where(['learn_id'=>$learn_id,'file_id'=>$id])->first();

        if($learnVdoModel){
            if($counter == 'success' || $learnVdoModel->learn_file_status == 's')
                {
                    $learnVdoModel->fill([
                        'learn_file_status' => 's'
                    ]);
                    $learnVdoModel->save();
                    
                    $chk_learn = Learn::findById($learn_id);
                    if($chk_learn->lesson_status !== "pass"){
                        $chk_learn->fill([
                            'lesson_status' => 'pass'
                        ]);

                        $chk_learn->save();
                    }
                    $att['no']      = $id;
                    $att['image']   = '<img src="' . asset('images/icon_checkpast.png') . '" alt="ผ่าน" title="ผ่าน" style="margin-bottom: 8px;">';

                    echo json_encode($att);
                }
            elseif($counter == 'counter' || $learnVdoModel->learn_file_status == 'l'){
                $view = File::findById($id);
                $views = $view->views+1;
                $view->fill([
                    'views' => $views
                ]);
                $view->save();
            }
        }else{
            $learnLog = new LearnFile;
            $learnLog->learn_id = $learn_id;
            $learnLog->user_id_file = Auth::user()->id;
            $learnLog->file_id = $id;
            $learnLog->learn_file_date = now();
            $learnLog->learn_file_status = "l";
            $learnLog->save();
            
            $chk_learn = Learn::findById($learn_id);
            $chk_learn->fill([
                'lesson_status' => 'learning'
            ]);

            $chk_learn->save();

            $att['no']      = $id;
            $att['image']   = '<img src="' . asset('images/icon_checklost.png') . '" alt="เรียนยังไม่ผ่าน" title="เรียนยังไม่ผ่าน" style="margin-bottom: 8px;">';

            echo json_encode($att);
        }
    }

    public function downloadfile($id,  Request $request)
{
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
    public function coursequestion($course_id,$id,  Request $request){
        if(Auth::check()){
            $post_test = Manage::where(['id' => $id, 'active' =>'y'])->first();
            if($post_test == null){
                Session::flash('sweetAlert', [
                    'title' => 'ไม่มีแบบทดสอบ',
                    'text' => 'ไม่มีแบบทดสอบจากบทเรียน',
                    'icon' => 'warning'
                ]);
                return redirect()->route('course.lesson',['course_id' => $course_id,'id' =>$id]);
            }
            $group = Grouptesting::where(['group_id' => $post_test->group_id,'active' =>'y'])->get();
            $lesson = Lesson::where('id',$id)->first();
            $course = Course::where('course_id',$course_id)->first();
            $cate = Category::where('cate_id',$course->cate_id)->first();
            $model = Question::where(['group_id'=> $post_test->group_id,'active' =>'y'])->get();
            if($post_test->type == 'pre'){
                $breadcrumbs = [
                    ['name' => 'หลักสูตร', 'url' => url('/cateOnline/index')],
                    ['name' => $cate->cate_title, 'url' => url('//courseOnline/index/' . $cate->id)],
                    ['name' => $lesson->title, 'url' => url('//courseOnline/learn/' . $lesson->id)],
                    ['name' => 'แบบทดสอบก่อนเรียน', 'url' => null], // You can set the URL to null for the current page
                ];
            }else{
                $breadcrumbs = [
                    ['name' => 'หลักสูตร', 'url' => url('/cateOnline/index')],
                    ['name' => $cate->cate_title, 'url' => url('//courseOnline/index/' . $cate->id)],
                    ['name' => $lesson->title, 'url' => url('//courseOnline/learn/' . $lesson->id)],
                    ['name' => 'แบบทดสอบหลังเรียน', 'url' => null], // You can set the URL to null for the current page
                ];
            }
            
            return view("course.question",['group'=> $group,'lesson'=>$lesson,'course'=>$course,'cate'=>$cate,'breadcrumbs'=>$breadcrumbs,'model'=>$model]);
        }else{
            return redirect()->route('index');
        }
       
    }
}
