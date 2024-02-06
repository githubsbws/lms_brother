<?php

namespace App\Http\Controllers;

use App\Models\Downloadtitle;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Profiles;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
   function index(){
      if((Auth::check())){
         $profile = Profiles::where('user_id',Auth::user()->id)->first();
         return view("profile.profile",['profile' => $profile]);
      }
      return route('index');
   }
}
