<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class LoginLController extends Controller
{
    function loginL()
    {
        return view('login.login');
    }

    // ตรวจสอบข้อมูล
    function login_to(Request $request): RedirectResponse
    {
        // ดึงค่า
        $username = $request->input('UserLogin.username');
        $password = md5($request->input('UserLogin.password'));
        $remember = $request->input('UserLogin.rememberMe');
        // เช็คฐานข้อมูล
        $users = User::where('username', $username)
            ->orWhere('email', $username)
            ->first();
        // เงื่อนไข
        if ($users && $users->password == $password) {
            if ($remember == 1) {
                return redirect()->route('index'); 
            }
            // dd($request->all());
            return redirect()->route('index');
        }
        return redirect()->route('login.login')->with('error', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง')->onlyInput('username', 'remember');
    }
    //----- ออกจากระบบ
    function logout_t(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->forget('key');
        return redirect('/login/login');
    }
}
