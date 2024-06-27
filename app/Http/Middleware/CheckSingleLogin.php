<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckSingleLogin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $userId = Auth::id();

            $currentSessionUserId = Session::get('single_login_user_id');

            if ($currentSessionUserId !== null && $currentSessionUserId !== $userId) {
                Auth::logout();
                Session::flush();

                return redirect()->route('login')->with('error', 'คุณได้ทำการเข้าสู่ระบบจากอุปกรณ์หรือเบราว์เซอร์อื่นแล้ว');
            }

            Session::put('single_login_user_id', $userId);
        }

        return $next($request);
    }
}
