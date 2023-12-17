<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class NewController extends Controller
{
    function new(){
        $news = News::paginate(5);
         return view("news\News",['news' =>$news]); 
    }

    function new_detail($id){
        $news = News::findById($id);
        return view("news\News_detail",['news' =>$news]); 
   }
}
