<?php

namespace App\Http\Controllers;

use App\Models\Downloadtitle;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
   function index(){
      
      return view("profile.profile");
   }
}
