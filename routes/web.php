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
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
// -------
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginLController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\UsabilityController;
use App\Http\Controllers\VirtualclassroomController;
use App\Http\Controllers\WebboardController;

//-------
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;


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
Route::get('/test', function () {
    return view('test');
});
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
// ----- dashboard
Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
// ----- faq
Route::get('faq_f',[FaqController::class,'faq_front'])->name('faq_front');
// ----- Forgot
Route::get('forgot/pass',[ForgotController::class,'forgotPass'])->name('forgot.pass');
// ----- index
Route::get('index',[IndexController::class,'index'])->name('index');
// ----- login
Route::get('logins',[LoginLController::class,'loginL'])->name('loginL.login');
// ----- new
Route::get('new',[NewController::class,'new'])->name('new');
Route::get('new_detail/{id}',[NewController::class,'new_detail'])->name('new_detail');
// ----- usability
Route::get('usability_front',[UsabilityController::class,'usability_front'])->name('usability_front');
// ----- virtualclassroom
Route::get('virtualclassroom',[VirtualclassroomController::class,'virtualclassroom'])->name('virtualclassroom');
// ----- WebboardController
Route::get('webboard',[WebboardController::class,'webboard'])->name('webboard');




// ----- admin src
Route::get('/aboutus',[AdminController::class,'aboutus'])->name('aboutus');

Route::get('/condition',[AdminController::class,'condition'])->name('condition');

Route::get('/setting',[AdminController::class,'setting'])->name('setting');

Route::get('/contactus',[AdminController::class,'contactus'])->name('contactus');

Route::get('/video',[AdminController::class,'video'])->name('video');

Route::get('/document',[AdminController::class,'document'])->name('document');

Route::get('/news',[AdminController::class,'news'])->name('news');

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

Route::get('/questionnaireout',[AdminController::class,'questionnaireout'])->name('questionnaireout');

Route::get('/orgchart',[AdminController::class,'orgchart'])->name('orgchart');

Route::get('/checklecture',[AdminController::class,'checklecture'])->name('checklecture');

Route::get('/coursecheck',[AdminController::class,'coursecheck'])->name('coursecheck');

Route::get('/certificate',[AdminController::class,'certificate'])->name('certificate');

Route::get('/signnature',[AdminController::class,'signnature'])->name('signnature');

Route::get('/captcha',[AdminController::class,'captcha'])->name('captcha');

Route::get('/usability',[AdminController::class,'usability'])->name('usability');

Route::get('/reportproblem',[AdminController::class,'reportproblem'])->name('reportproblem');

Route::get('/faqtype',[AdminController::class,'faqtype'])->name('faqtype');

Route::get('/faq',[AdminController::class,'faq'])->name('faq');

Route::get('/adminuser',[AdminController::class,'adminuser'])->name('adminuser');

Route::get('/pgroup',[AdminController::class,'pgroup'])->name('pgroup');

Route::get('/user_admin',[AdminController::class,'user_admin'])->name('user_admin');

Route::get('/coursefield',[AdminController::class,'coursefield'])->name('coursefield');

Route::get('/imgslide',[AdminController::class,'imgslide'])->name('imgslide');

Route::get('/librarytype',[AdminController::class,'librarytype'])->name('librarytype');

Route::get('/libraryfile',[AdminController::class,'libraryfile'])->name('libraryfile');

Route::get('/coursenotification',[AdminController::class,'coursenotification'])->name('coursenotification');

Route::get('/passcourse',[AdminController::class,'passcourse'])->name('passcourse');

Route::get('/student_photo',[AdminController::class,'student_photo'])->name('student_photo');

Route::get('/capture',[AdminController::class,'capture'])->name('capture');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
