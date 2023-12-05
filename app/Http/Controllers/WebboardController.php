<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebboardController extends Controller
{
    function webboard(){
        return view("webboard\webboard");
    }
}
