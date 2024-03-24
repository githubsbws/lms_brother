<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Profiles;
class NewController extends Controller
{
    function new(Request $request){

        $query = $request->input('search_text');

        if($query){
            $news = News::join('profiles','profiles.user_id','=','news.update_by')->where('active','y')->where('cms_title', 'like', "%$query%")->orderBy('create_date','DESC')->paginate(5);
        }else{
            $news = News::join('profiles','profiles.user_id','=','news.update_by')->where('active','y')->orderBy('create_date','DESC')->paginate(5);
        }

         return view("news.News",['news' =>$news]); 
    }

    function new_detail($id){
        $news = News::findById($id);
        $profiles = Profiles::where('user_id',$news->update_by)->first();
        return view("news.News_detail",['news' =>$news,'profiles' =>$profiles]); 
   }
}
