<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Downloadtitle;
use App\Models\Downloadcategoty;
use App\Models\DownloadFileDoc;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class DownloadController extends Controller
{
    function download(){
        if(Auth::check()){

            $download_title = Downloadtitle::where('active','y')->get();
            
            return view('download.download',['download_title' =>$download_title]);
        }
        return view('auth.login');
    }
    function downloadfiles($id,  Request $request){
         // Retrieve the file information from the database
        $file = DownloadFileDoc::where('filedoc_id',$id)->first();

        if (!$file) {
            return response()->json(['error' => 'File not found in database'], 404);
        }
        // Check if the file exists
        // dd($file->toArray());
        // Construct the full file path
        $file_path = public_path('images/uploads/filedoc/'.$file->filedocname);

        $download_name = pathinfo($file->filedoc_name, PATHINFO_EXTENSION) === 'pdf'
        ? $file->filedoc_name
        : $file->filedoc_name . '.pdf';

        // Check if the file actually exists on the server
        if (file_exists($file_path)) {
            return response()->download($file_path, $download_name);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }
}
