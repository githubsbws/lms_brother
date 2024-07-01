<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Events\SessionEnded;
use Illuminate\Support\Facades\Session;

class CheckSessionExpired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Session::isExpired() && Auth::check()) {
            // Trigger the event for session end
            event(new SessionEnded(Auth::user()));
            Auth::logout();
            Session::flush();
        }

        return $next($request);
    }
}
