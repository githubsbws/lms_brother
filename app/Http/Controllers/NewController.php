<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class NewController extends Controller
{
    function new(){
        $news = News::join('profiles','profiles.user_id','=','news.update_by')->where('active','y')->orderBy('create_date','DESC')->paginate(5);
         return view("news\News",['news' =>$news]); 
    }

    function new_detail($id){
        $news = News::findById($id);
        return view("news\News_detail",['news' =>$news]); 
   }
}
