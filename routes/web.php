<?php

use Illuminate\Support\Facades\Route;
use App\Models\Profiles;

use App\Http\Controllers\EditController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InsertController;
use App\Http\Controllers\VedioController;
use App\Http\Controllers\UpvedioController;
use App\Http\Middleware\Authenticate;

// -------
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginLController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\UsabilityController;
use App\Http\Controllers\VirtualclassroomController;
use App\Http\Controllers\WebboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
//-------
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [IndexController::class,'index'])->name('index');

Route::get('logins', [LoginController::class,'showLoginForm'])->name('login');
Route::post('logins', [LoginController::class,'login'])->name('logins');
Route::post('logout', [LoginController::class,'logout'])->name('logout');
Route::get('profile',[ProfileController::class,'index'])->name('profile');

Route::get('/admin', function () {
    return view('admin/index/index');
});

// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/admin', 'AdminController@index');
// });
// Route::get('admin', [AdminController::class,'admin'])->name('admin')->middleware('auth');
//----- ในส่วนของหน้า Bank
// รายชื่อธนาคาร
Route::get('bank', [AdminController::class,'bank'])->name('bank')->middleware('auth');
// ข้อมูลผู้ใช้
Route::get('/user', [AdminController::class,'user'])->name('user');
// ลบ VDO
Route::get('del/{id}',[AdminController::class,'del'])->name('del');

//----- ในส่วนของหน้า Insert
// ส่งเพิ่มข้อมูล
Route::post('insert',[InsertController::class,'insert'])->name('insert');

//----- ในส่วนของหน้า vdo
Route::get('vedio/{id}',[VedioController::class,'vedio'])->name('vedio');
// เพิ่ม vedio
Route::post('/vedio/vedio_in',[VedioController::class,'vedioIn'])->name('vedio.vedio_in');

//----- ในส่วนของหน้า up_vdo
Route::get('up_vedio/{id}',[UpvedioController::class,'up_vedio'])->name('up_vedio');
// เพิ่ม vedio
Route::post('/up_vedio/up_vedio_in',[UpvedioController::class,'vedioInUp'])->name('up_vedio.up_vedio_in');

//----- ในส่วนของหน้า Edit
// แก้ไข
Route::get('edit/{bank_id}',[EditController::class,'edit'])->name('edit');
// แก้ไขข้อมูล
Route::post('update/{id}',[EditController::class,'update'])->name('update');
// เปลี่ยนสถานะ
Route::get('change/{bank_id}',[EditController::class,'change'])->name('change');


//----- ในส่วนของหน้า Login
// หน้า login
// Route::get('login',[LoginController::class,'login'])->name('login');
// // ส่งตรวจสอบ
// Route::post('login_in',[LoginController::class,'login_in'])->name('login_in');
// // ออกจาระบบ
// Route::get('logout',[LoginController::class,'logout'])->name('logout');

// ------------------------------------------
// ----- login
Route::get('/login/login',[LoginLController::class,'loginL'])->name('login.login');
Route::post('/lms_brother_docker/lms/app/index/user/login',[LoginLController::class,'login_to'])->name('login_to');
Route::get('logout_t',[LoginLController::class,'logout_t'])->name('logout_t');
// ----- index
Route::get('index/my',[IndexController::class,'index'])->name('index');
// ----- Forgot
Route::get('forgot-pass',[ForgotController::class,'forgotPass'])->name('forgot.pass');
Route::post('/lms_brother_docker/lms/app/index/user/recovery',[ForgotController::class,'forgotRecovery'])->name('forgot.recovery');
// ----- course
Route::get('course',[CourseController::class,'course'])->name('course');
// Route::get('detail',[CourseController::class,'courseDetail'])->name('course.detail');
Route::get('course/detail/{id}',[CourseController::class,'courseDetail'])->name('course.detail');
Route::get('course/detail/{course_id}/lesson/{id}',[CourseController::class,'courseLesson'])->name('course.lesson');
Route::get('course/LearnVdo/{id}/{learn_id}/{counter}',[CourseController::class,'LearnVdo'])->name('course.LearnVdo');
Route::get('course/question/{course_id}/{id}',[CourseController::class,'coursequestion'])->name('course.coursequestion');
Route::get('course/question/{group}',[CourseController::class,'coursequestion'])->name('course.question');
Route::get('download/{id}',[CourseController::class,'downloadfile'])->name('course.downloadfile');
// choice
Route::post('/choiceAnswer/{id}',[ChoiceController::class,'choiceAnswer'])->name('choice.Answer');
// ----- dashboard
Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

Route::get('download',[DownloadController::class,'download'])->name('download');
Route::get('downloads/{id}',[DownloadController::class,'downloadfiles'])->name('download.downloadfiles');
// ----- faq
Route::get('faq_f',[FaqController::class,'faq_front'])->name('faq_front');
// ----- Forgot
Route::get('forgot/pass',[ForgotController::class,'forgotPass'])->name('forgot.pass');
// ----- index
Route::get('index',[IndexController::class,'index'])->name('index');
// ----- login
// Route::get('logins',[LoginLController::class,'loginL'])->name('loginL.login');

// ----- new
Route::get('new',[NewController::class,'new'])->name('new');
Route::get('new_detail/{id}',[NewController::class,'new_detail'])->name('new_detail');
// ----- usability
Route::get('usability_front',[UsabilityController::class,'usability_front'])->name('usability_front');
// ----- virtualclassroom
Route::get('virtualclassroom',[VirtualclassroomController::class,'virtualclassroom'])->name('virtualclassroom');
// ----- WebboardController





// ----- admin src
Route::get('/aboutus',[AdminController::class,'aboutus'])->name('aboutus');

Route::get('/condition',[AdminController::class,'condition'])->name('condition');

Route::get('/setting',[AdminController::class,'setting'])->name('setting');

Route::get('/contactus',[AdminController::class,'contactus'])->name('contactus');
Route::get('contactus_create',[AdminController::class,'contactus_create'])->name('contactus_create');

Route::get('/contactus_create',[AdminController::class,'contactus_create'])->name('contactus_create');

Route::post('/contactus_insert',[AdminController::class,'contactus_insert'])->name('contactus_insert');

Route::get('/contactus_edit_page/{id}',[AdminController::class,'contactus_edit_page'])->name('contactus_edit_page');

Route::post('/contactus_edit/{id}',[AdminController::class,'contactus_edit'])->name('contactus_edit');

Route::get('/contactus_delete/{id}',[AdminController::class,'contactus_delete'])->name('contactus_delete');

//  new p
Route::get('/video_create',[AdminController::class,'video_create'])->name('video_create');
Route::get('/video',[AdminController::class,'video'])->name('video');
Route::post('/video_insert',[AdminController::class,'video_insert'])->name('video_insert');
Route::get('/video_edit/{vdo_id}',[AdminController::class,'video_edit'])->name('video_edit');
Route::post('/video_update/{vdo_id}',[AdminController::class,'video_update'])->name('video_update');
Route::get('/video_delete/{vdo_id}',[AdminController::class,'video_delete'])->name('video_delete');
//

//---- category
Route::get('/category',[AdminController::class,'category'])->name('category');
Route::get('/category-create',[CategoryController::class,'categorycreate'])->name('category-create');
Route::post('/admin/index.php/Category/create',[CategoryController::class,'categorycreateto'])->name('category-create-to');
Route::get('/admin/index.php/category/update/{id}',[CategoryController::class,'categoryedit'])->name('category-edit');
Route::post('/admin/index.php/category/edit/{id}',[CategoryController::class,'categoryeditto'])->name('category-edit-to');
Route::get('/admin/index.php/category/change/{id}',[CategoryController::class,'categorychange'])->name('category-change');
Route::get('/admin/index.php/category/{id}',[CategoryController::class,'categorydet'])->name('category-det');
//---- end category

//---- courseoline
Route::get('/courseonline',[AdminController::class,'courseonline'])->name('courseonline');
Route::get('/courseonline-create',[CourseController::class,'courseonlinecreate'])->name('courseonline-create');
Route::post('/admin/index.php/CourseOnline/create',[CourseController::class,'courseonlinecreateto'])->name('courseonline-create-to');
Route::get('/admin/index.php/courseOnline/update/{id}',[CourseController::class,'courseonlineedit'])->name('courseonline-edit');
Route::post('/admin/index.php/CourseOnline/edit/{id}',[CourseController::class,'courseonlineeditto'])->name('courseonline-edit-to');
Route::get('/admin/index.php/courseOnline/change/{id}',[CourseController::class,'courseonlinechange'])->name('courseonline-change');
Route::get('/admin/index.php/courseOnline/{id}',[CourseController::class,'courseonlinedet'])->name('courseonline-det');
//---- end courseoline

//---- lesson
Route::get('/lesson',[AdminController::class,'lesson'])->name('lesson');
Route::get('/lession-create',[LessonController::class,'lessioncreate'])->name('lession-create');
Route::post('/admin/index.php/Lesson/create',[LessonController::class,'lessioncreateto'])->name('lession-create-to');
Route::get('/admin/index.php/lesson/update/{id}',[LessonController::class,'lessionedit'])->name('lession-edit');
Route::post('/admin/index.php/lesson/edit/{id}',[LessonController::class,'lessioneditto'])->name('lession-edit-to');
Route::get('/admin/index.php/lesson/change/{id}',[LessonController::class,'lessionchange'])->name('lession-change');
Route::get('/admin/index.php/lesson/{id}',[LessonController::class,'lessiondet'])->name('lession-det');
//----end lesson

Route::get('/grouptesting',[AdminController::class,'grouptesting'])->name('grouptesting');

Route::get('/coursegrouptesting',[AdminController::class,'coursegrouptesting'])->name('coursegrouptesting');

//new p
Route::get('/questionnaireout',[AdminController::class,'questionnaireout'])->name('questionnaireout');
Route::get('/questionnaireout_create',[AdminController::class,'questionnaireout_create'])->name('questionnaireout_create');
Route::post('/questionnaireout_insert',[AdminController::class,'questionnaireout_insert'])->name('questionnaireout_insert');
Route::get('/questionnaireout_edit/{survey_header_id}',[AdminController::class,'questionnaireout_edit'])->name('questionnaireout_edit');
Route::post('/questionnaireout_update/{survey_header_id}',[AdminController::class,'questionnaireout_update'])->name('questionnaireout_update');
Route::get('/questionnaireout_delete/{survey_header_id}',[AdminController::class,'questionnaireout_delete'])->name('questionnaireout_delete');
//

//new p
Route::get('/orgchart',[AdminController::class,'orgchart'])->name('orgchart');
Route::get('/orgchart_create',[AdminController::class,'orgchart_create'])->name('orgchart_create');
Route::post('/orgchart_insert',[AdminController::class,'orgchart_insert'])->name('orgchart_insert');
Route::get('/orgchart_edit/{orgchart_id}',[AdminController::class,'orgchart_edit'])->name('orgchart_edit');
Route::post('/orgchart_update/{orgchart_id}',[AdminController::class,'orgchart_update'])->name('orgchart_update');
Route::get('/orgchart_delete/{orgchart_id}',[AdminController::class,'orgchart_delete'])->name('orgchart_delete');
//

Route::get('/checklecture',[AdminController::class,'checklecture'])->name('checklecture');

Route::get('/coursecheck',[AdminController::class,'coursecheck'])->name('coursecheck');

Route::get('/certificate',[AdminController::class,'certificate'])->name('certificate');

Route::get('/signnature',[AdminController::class,'signnature'])->name('signnature');

Route::get('/captcha',[AdminController::class,'captcha'])->name('captcha');

Route::get('/usability',[AdminController::class,'usability'])->name('usability');

Route::get('/reportproblem',[AdminController::class,'reportproblem'])->name('reportproblem');

Route::get('/faqtype',[AdminController::class,'faqtype'])->name('faqtype');

Route::get('/faqtype_create',[AdminController::class,'faqtype_create'])->name('faqtype_create');

Route::post('/faqtype_insert',[AdminController::class,'faqtype_insert'])->name('faqtype_insert');

Route::get('/faqtype_edit_page/{id}',[AdminController::class,'faqtype_edit_page'])->name('faqtype_edit_page');

Route::post('/faqtype_edit/{id}',[AdminController::class,'faqtype_edit'])->name('faqtype_edit');

Route::get('/faqtype_delete/{id}',[AdminController::class,'faqtype_delete'])->name('faqtype_delete');

Route::get('/learnreset_resetuser',[AdminController::class,'learnreset_resetuser'])->name('learnreset_resetuser');

Route::get('/learnreset_resetuser_insert',[AdminController::class,'learnreset_resetuser_insert'])->name('learnreset_resetuser_insert');

Route::get('/faq',[AdminController::class,'faq'])->name('faq');

Route::get('/faq_create',[AdminController::class,'faq_create'])->name('faq_create');

Route::post('/faq_insert',[AdminController::class,'faq_insert'])->name('faq_insert');

Route::get('/faq_edit_page/{id}',[AdminController::class,'faq_edit_page'])->name('faq_edit_page');

Route::post('/faq_edit/{id}',[AdminController::class,'faq_edit'])->name('faq_edit');

Route::get('/faq_delete/{id}',[AdminController::class,'faq_delete'])->name('faq_delete');
// new p
Route::get('/adminuser',[AdminController::class,'adminuser'])->name('adminuser');
Route::get('/adminuser_create',[AdminController::class,'adminuser_create'])->name('adminuser_create');
Route::post('/adminuser_insert',[AdminController::class,'adminuser_insert'])->name('adminuser_insert');
Route::post('/adminuser_update/{id}',[AdminController::class,'adminuser_update'])->name('adminuser_update');
Route::get('/adminuser_delete/{id}',[AdminController::class,'adminuser_delete'])->name('adminuser_delete');
Route::get('/adminuser_edit/{id}',[AdminController::class,'adminuser_edit'])->name('adminuser_edit');
//

// new p
Route::get('/pgroup',[AdminController::class,'pgroup'])->name('pgroup');
Route::get('/pgroup_create',[AdminController::class,'pgroup_create'])->name('pgroup_create');
Route::post('/pgroup_insert',[AdminController::class,'pgroup_insert'])->name('pgroup_insert');
Route::post('/pgroup_update/{pgroup_id}',[AdminController::class,'pgroup_update'])->name('pgroup_update');
Route::get('/pgroup_delete/{pgroup_id}',[AdminController::class,'pgroup_delete'])->name('pgroup_delete');
Route::get('/pgroup_edit/{pgroup_id}',[AdminController::class,'pgroup_edit'])->name('pgroup_edit');
//

Route::get('/user_admin',[AdminController::class,'user_admin'])->name('user_admin');

Route::get('/coursefield',[AdminController::class,'coursefield'])->name('coursefield');

// new p
Route::get('/imgslide',[AdminController::class,'imgslide'])->name('imgslide');
Route::get('/imgslide_create',[AdminController::class,'imgslide_create'])->name('imgslide_create');
Route::post('/imgslide_insert',[AdminController::class,'imgslide_insert'])->name('imgslide_insert');
Route::post('/imgslide_update/{imgslide_id}',[AdminController::class,'imgslide_update'])->name('imgslide_update');
Route::get('/imgslide_delete/{imgslide_id}',[AdminController::class,'imgslide_delete'])->name('imgslide_delete');
Route::get('/imgslide_edit/{imgslide_id}',[AdminController::class,'imgslide_edit'])->name('imgslide_edit');
//

Route::get('/librarytype',[AdminController::class,'librarytype'])->name('librarytype');

Route::get('/libraryfile',[AdminController::class,'libraryfile'])->name('libraryfile');

Route::get('/coursenotification',[AdminController::class,'coursenotification'])->name('coursenotification');

Route::get('/passcourse',[AdminController::class,'passcourse'])->name('passcourse');

Route::get('/student_photo',[AdminController::class,'student_photo'])->name('student_photo');

Route::get('/capture',[AdminController::class,'capture'])->name('capture');

Route::get('/document',[AdminController::class,'document'])->name('document');

Route::get('/document_create',[AdminController::class,'document_create'])->name('document_create');

Route::get('/document_index_type',[AdminController::class,'document_index_type'])->name('document_index_type');

Route::post('/document_insert',[AdminController::class,'document_insert'])->name('document_insert');

Route::get('/document_delete/{usa_id}',[AdminController::class,'document_delete'])->name('document_delete');

Route::get('/document_edit/{usa_id}',[AdminController::class,'document_edit'])->name('document_edit');

Route::post('/document_update/{usa_id}',[AdminController::class,'document_update'])->name('document_update');

Route::get('/news',[AdminController::class,'news'])->name('news');

Route::get('/news_create',[AdminController::class,'news_create'])->name('news_create');

Route::post('/news_insert',[AdminController::class,'news_insert'])->name('news_insert');

Route::get('/news_edit/{cms_id}',[AdminController::class,'news_edit'])->name('news_edit');

Route::get('/news_delete/{cms_id}',[AdminController::class,'news_delete'])->name('news_delete');

Route::post('/news_update/{cms_id}',[AdminController::class,'news_update'])->name('news_update');

Route::get('/grouptesting',[AdminController::class,'grouptesting'])->name('grouptesting');

Route::get('/grouptesting_create',[AdminController::class,'grouptesting_create'])->name('grouptesting_create');

Route::post('/grouptesting_insert',[AdminController::class,'grouptesting_insert'])->name('grouptesting_insert');

Route::get('/grouptesting_delete/{group_id}',[AdminController::class,'grouptesting_delete'])->name('grouptesting_delete');

Route::get('/grouptesting_edit/{group_id}',[AdminController::class,'grouptesting_edit'])->name('grouptesting_edit');

Route::post('/grouptesting_update/{group_id}',[AdminController::class,'grouptesting_update'])->name('grouptesting_update');

Route::get('/question',[AdminController::class,'question'])->name('question');

Route::get('/question_create',[AdminController::class,'question_create'])->name('question_create');

Route::post('/question_insert',[AdminController::class,'question_insert'])->name('question_insert');

Route::get('/question_edit_page/{id}',[AdminController::class,'question_edit_page'])->name('question_edit_page');

Route::post('/question_edit/{id}',[AdminController::class,'question_edit'])->name('question_edit');

Route::get('/question_delete/{id}',[AdminController::class,'question_delete'])->name('question_delete');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/generation',[AdminController::class,'generation'])->name('generation');

Route::get('/generation_create',[AdminController::class,'generation_create'])->name('generation_create');

Route::post('/generation_insert',[AdminController::class,'generation_insert'])->name('generation_insert');

Route::get('/generation_edit_page/{id}',[AdminController::class,'generation_edit_page'])->name('generation_edit_page');

Route::post('/generation_edit/{id}',[AdminController::class,'generation_edit'])->name('generation_edit');

Route::get('/generation_delete/{id}',[AdminController::class,'generation_delete'])->name('generation_delete');

// ----- Classroom
Route::get('classroom',[AdminController::class,'classroom'])->name('classroom');

Route::get('/classroom_edit/{id}',[AdminController::class,'classroom_edit'])->name('classroom_edit');

Route::get('/classroom_delete/{id}',[AdminController::class,'classroom_delete'])->name('classroom_delete');

Route::post('/classroom_update/{id}',[AdminController::class,'classroom_update'])->name('classroom_update');

