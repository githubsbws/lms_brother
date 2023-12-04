<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginLController extends Controller
{
    function loginL(){
        return view("login\login");
    }
}
