<?php

use Illuminate\Support\Facades\Route;
use App\Models\Profiles;

use App\Http\Controllers\EditController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InsertController;
use App\Http\Controllers\VedioController;
use App\Http\Controllers\UpvedioController;
use App\Http\Middleware\Authenticate;

// -------
use App\Http\Controllers\CourseController;
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

Route::get('/', function () {
    return view('index/index');
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/admin', function () {
    return view('admin/index/index');
});


//----- ในส่วนของหน้า Login
// หน้า login
Route::get('login',[LoginController::class,'login'])->name('login');
// ส่งตรวจสอบ
Route::post('login_in',[LoginController::class,'login_in'])->name('login_in');
// ออกจาระบบ
Route::get('logout',[LoginController::class,'logout'])->name('logout');

// ------------------------------------------
// ----- course
Route::get('course',[CourseController::class,'course'])->name('course');
Route::get('course/detail',[CourseController::class,'courseDetail'])->name('course.detail');
Route::get('course/lesson',[CourseController::class,'courseLession'])->name('course.lesson');
// ----- dashboard
Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
// ----- faq
Route::get('faq',[FaqController::class,'faq'])->name('faq');
// ----- Forgot
Route::get('forgot/pass',[ForgotController::class,'forgotPass'])->name('forgot.pass');
// ----- index
Route::get('index',[IndexController::class,'index'])->name('index');
// ----- login
Route::get('login/login',[LoginLController::class,'loginL'])->name('login.login');
// ----- new
Route::get('new',[NewController::class,'new'])->name('new');
// ----- usability
Route::get('usability',[UsabilityController::class,'usability'])->name('usability');
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

Route::get('/category',[AdminController::class,'category'])->name('category');

Route::get('/courseonline',[AdminController::class,'courseonline'])->name('courseonline');

Route::get('/lesson',[AdminController::class,'lesson'])->name('lesson');

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