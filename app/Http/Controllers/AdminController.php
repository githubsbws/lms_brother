<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // รายชื่อธนาคาร
    function bank()
    {
        $banks = DB::table('bank')->paginate(5);
        return view('bank', compact('banks'));
    }
    // หน้าเพิ่มข้อมูล
    function insertt()
    {
        return view('bank');
    }
    // หน้าส่งเพิ่มข้อมูลBank
    function insert(Request $request)
    {
        $request->validate([
            'bank_user' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'bank_branch' => 'required|string|max:255',
            'bank_number' => 'required|string|max:255',
            'bank_picture' => 'required|image|mimes:jpeg,png,jpg,gif',
        ], [
            'bank_user.required' => 'กรุณากรอกชื่อเจ้าของบัญชี',
            'bank_name.required' => 'กรุณากรอกชื่อธนาคาร',
            'bank_branch.required' => 'กรุณากรอกชื่อสาขา',
            'bank_number.required' => 'กรุณากรอกเลขบัญชี',
            'bank_picture.required' => 'กรุณาใส่รูป',
            'bank_picture.image' => 'ไฟล์ที่อัปโหลดต้องเป็นรูปภาพ',
            'bank_picture.mimes' => 'รูปภาพต้องมีนามสกุล jpeg, png, jpg, หรือ gif',
        ]);
        // จัดการการอัพโหลดไฟล์
        $uploadedFile = $request->file('bank_picture');
        $extension = $uploadedFile->getClientOriginalExtension();
        // ตั้งชื่อไฟล์
        $filename = now()->format('Ymd') . '_' . Str::random(5) . '_Picture.' . $extension;
        // บันทึกไฟล์ภาพ
        $imagePath = $uploadedFile->storeAs('images', $filename);
        // รับข้อมูลเก็บไว้ที่ตัวแปร data และส่งไปที่ตาราง tbl_bank
        $data = [
            'bank_user' => $request->input('bank_user'),
            'bank_name' => $request->input('bank_name'),
            'bank_branch' => $request->input('bank_branch'),
            'bank_number' => $request->input('bank_number'),
            'bank_picture' => $filename, 
        ];
        DB::table('bank')->insert($data);
        return response()->json(['message' => 'บันทึกข้อมูลสำเร็จ']);
    }
    // ลบข้อมูล
    function delete($bank_id)
    {
        // DB::table('bank')->where('bank_id', $bank_id)->delete();
        // return redirect('index');
    }
    // แก้ไขข้อมูล
    function edit($bank_id)
    {
        // $banks = DB::table('bank')->where('bank_id', $bank_id)->first();
        // return view('edit', compact('banks'));
    }
}
