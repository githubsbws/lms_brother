<?php

use Illuminate\Support\Facades\Route;
use App\Models\Profiles;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InsertController;
use App\Http\Controllers\VedioController;
use App\Http\Controllers\UpvedioController;
use App\Http\Middleware\Authenticate;

// -------
use App\Http\Controllers\CourseController;
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
// ----- course
Route::get('course',[CourseController::class,'course'])->name('course');
Route::get('detail',[CourseController::class,'courseDetail'])->name('course.detail');
Route::get('lesson',[CourseController::class,'courseLession'])->name('course.lesson');
// ----- dashboard
Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
// ----- faq
Route::get('faq',[FaqController::class,'faq'])->name('faq');
// ----- Forgot
Route::get('forgot/pass',[ForgotController::class,'forgotPass'])->name('forgot.pass');
// ----- index
Route::get('index',[IndexController::class,'index'])->name('index');
// ----- login
Route::get('login',[LoginLController::class,'loginL'])->name('login.login');
// ----- new
Route::get('new',[NewController::class,'new'])->name('new');
// ----- usability
Route::get('usability',[UsabilityController::class,'usability'])->name('usability');
// ----- virtualclassroom
Route::get('virtualclassroom',[VirtualclassroomController::class,'virtualclassroom'])->name('virtualclassroom');
// ----- WebboardController
Route::get('webboard',[WebboardController::class,'webboard'])->name('webboard');
