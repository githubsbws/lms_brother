<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Downloadtitle;
use App\Models\Downloadcategoty;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class DownloadController extends Controller
{
    function download(){
        if(Auth::check()){

            $download_title = Downloadtitle::where('active','y')->get();
            
            return view('download/download',['download_title' =>$download_title]);
        }
        return view('auth.login');
    }
}
