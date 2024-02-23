<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Auth;

class AuthFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'auth';
    }

    public static function useradmin()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return Auth::user();
        }
        return null;
    }
}