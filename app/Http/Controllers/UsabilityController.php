<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsabilityController extends Controller
{
    function usability_front(){
        return view("usability_f\usability");
    }
    function usability(){
        return view("usability\usability");
    }
}
