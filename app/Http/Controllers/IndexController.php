<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class IndexController extends Controller
{
   function index(){
      $news = News::where('active','y')->limit(4)->get();
    return view("index.index",[
      'news' => $news
    ]);
   }
}
