<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewController extends Controller
{
    function new(){
         return view("news\snews"); 
    }
}
