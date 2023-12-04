<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsabilityController extends Controller
{
    function usability(){
        return view("usability\usability");
    }
}
