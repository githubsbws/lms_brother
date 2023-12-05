<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class AdminController extends Controller
{
    //----- หน้ารายชื่อธนาคาร
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
}
