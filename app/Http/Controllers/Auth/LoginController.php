<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



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
        $password = md5($request->password);
        // check users
        $user = Users::join('profiles','profiles.user_id','=','users.id')->where('username', $request->username)->first();
        // dd($user->firstname);
        if (!$user || $password != $user->password) {
            // Authentication failed
            
            return back()->withErrors(['username' => 'Invalid credentials'])->withInput($request->only('username'));
        }
        else{
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
