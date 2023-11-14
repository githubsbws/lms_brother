<?php

use Illuminate\Support\Facades\Route;
use App\Models\Profiles;
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
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});

// รายชื่อธนาคาร
Route::get('/bank', [AdminController::class,'bank'])->name('bank');
// เพิ่มข้อมูล
// Route::get('insert',[AdminController::class,'insertt'])->name('insertt');
// ลบข้อมูล
Route::get('delete/{bank_id}',[AdminController::class,'delete'])->name('delete');
// แก้ไข
Route::get('edit/{bank_id}',[AdminController::class,'edit'])->name('edit');
// ส่งเพิ่มข้อมูล
Route::post('insert',[AdminController::class,'insert'])->name('insert');
// // แก้ไขข้อมูล
// Route::post('update/{id}',[AdminController::class,'update'])->name('update');