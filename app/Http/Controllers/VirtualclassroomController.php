<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VirtualclassroomController extends Controller
{
    function virtualclassroom(){
        return view("virtualclassroom\svirtualclassroom");
    }
}
