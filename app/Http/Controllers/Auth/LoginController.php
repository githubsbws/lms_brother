<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // ตรวจสอบข้อมูลเข้าสู่ระบบ
        $request->validate([
            'username' => 'required|validate_username',
            'password' => 'required',
        ]);

        // เข้ารหัสรหัสผ่าน
        $password = $request->password;

        // ตรวจสอบข้อมูลผู้ใช้
        $user = Users::join('profiles', 'profiles.user_id', '=', 'users.id')->where('username', $request->username)->first();

        // ตรวจสอบความถูกต้องของรหัสผ่าน
        $passwordIsMD5 = preg_match('/^[a-f0-9]{32}$/', $user->password);

        // Check password correctness
        if (!$user || !Hash::check($password, $user->password)) {
            // Authentication failed
            sleep(10);
            return back()->withErrors(['username' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง กรุณาลองอีกครั้ง'])->withInput($request->only('username'));
        } elseif ($passwordIsMD5) {
            // MD5 password detected
            return back()->withErrors(['username' => 'กรุณาเปลี่ยนรหัสผ่านของคุณเป็นรหัสผ่านใหม่ที่ใช้รูปแบบที่ปลอดภัย'])->withInput($request->only('username'));
        } else {
            // Login success
            Auth::login($user);
            return redirect()->intended('index');
        }
    }
    public function logout()
    {
        Auth::logout();

        // Redirect to the home page or any other desired page
        return redirect('/');
    }
}
