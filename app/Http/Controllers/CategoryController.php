<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    // category create
    function categorycreate()
    {
        // $category_on = DB::table('category');
        return view("admin\category\category-create");
    }
    // category create to
    function categorycreateto(Request $request)
    {
        // img
        $uploadedFile = $request->file('Category.cate_image');
        $extension = $uploadedFile->getClientOriginalExtension();
        $filename = now()->format('Ymd') . rand(10000, 99999) . '_Picture.' . $extension;
        $uploadedFile->storeAs('public/images/uploads/category/', $filename);
        // ข้อมูล
        $data = [
            'cate_title' => $request->input('Category.cate_title'),
            'cate_short_detail' => $request->input('Category.cate_short_detail'),
            'cate_detail' => $request->input('Category.cate_detail'),
            'cate_image' => $filename,
        ];
        DB::table('category')->insert($data);
        $redirectUrl = route('category');
        return redirect($redirectUrl);
    }
// category edit
    function categoryedit(Request $request, $id)
    {
        $category = DB::table('category')->where('cate_id', $id)->first();
        return view("admin\category\category-edit", compact('category'));
    }
// category edit to
    function categoryeditto(Request $request, $id)
    {
        // img
        $filename = DB::table('category')->where('cate_id', $id)->value('cate_image');
        $uploadedFile = $request->file('Category.cate_image');
        if ($uploadedFile) {
            $extension = $uploadedFile->getClientOriginalExtension();
            // ตั้งชื่อไฟล์
            $filename = now()->format('Ymd') . rand(10000, 99999) . '_Picture.' . $extension;
            // บันทึกไฟล์
            $uploadedFile->storeAs('public/images/uploads/category/', $filename);
            // อัปเดตไฟล์ลงฐานข้อมูล
            DB::table('category')->where('cate_id', $id)->update([
                'cate_image' => $filename,
            ]);
        }
        // ข้อมูล
        $data = [
            'cate_title' => $request->input('Category.cate_title'),
            'cate_short_detail' => $request->input('Category.cate_short_detail'),
            'cate_detail' => $request->input('Category.cate_detail'),
            'cate_image' => $filename,
            'update_date' => now(),
        ];
        // บันทึก
        DB::table('category')->where('cate_id', $id)->update($data);
        $redirectUrl = route('category');
        return redirect($redirectUrl);
    }

    // category change to id
    function categorychange($id)
    {
        $category = DB::table('category')->where('cate_id', $id)->first();
        // ตรวจสอบค่าปัจจุบันของ 'active' และกำหนดค่าใหม่
        $newActive = ($category->active == 'y') ? 'n' : 'y';
        $data = [
            'active' => $newActive,
        ];
        DB::table('category')->where('cate_id', $id)->update($data);
        $redirectUrl = route('category');
        return redirect($redirectUrl);
    }

    // category det show
    function categorydet(Request $request, $id)
    {
     
    }

}
