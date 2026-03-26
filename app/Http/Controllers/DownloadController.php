<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Downloadtitle;
use App\Models\Downloadcategoty;
use App\Models\DownloadFileDoc;
use App\Models\DownloadFile;
use App\Helpers\DocumentPermissionHelper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class DownloadController extends Controller
{
    function download(){
        if(Auth::check()){
            $userId = auth()->id();

            $titles = Downloadtitle::where('active','y')->get();
            $filteredTitles = [];

            foreach ($titles as $title) {

                $categories = Downloadcategoty::where('title_id', $title->title_id)
                                ->where('active','y')
                                ->get();

                $titleHasPermission = false;

                foreach ($categories as $cate) {

                    if (!DocumentPermissionHelper::userHasCategoryPermission($cate->download_id, $userId)) {
                        continue;
                    }

                    $files = DownloadFile::join('download_filedoc', 'download_filedoc.file_id', '=', 'download_file.file_id')
                        ->where('download_file.download_id', $cate->download_id)
                        ->where('download_file.active', 'y')
                        ->where('download_filedoc.active', 'y')
                        ->select('download_filedoc.filedoc_id')
                        ->distinct()
                        ->get();

                    foreach ($files as $file) {
                        if (DocumentPermissionHelper::userHasPermission($file->filedoc_id, $userId)) {
                            $titleHasPermission = true;
                            break 2; 
                        }
                    }
                }

                if ($titleHasPermission) {
                    $filteredTitles[] = $title;
                }
            }
            
            return view('download.download',['download_title' =>$filteredTitles]);
        }
        return view('auth.login');
    }
    function downloadfiles($id,  Request $request){
         // Retrieve the file information from the database
        $file = DownloadFileDoc::where('filedoc_id', $id)->first();

        if (!$file) {
            return response()->json(['error' => 'File not found in database'], 404);
        }

        // Construct the full file path
        $file_path = public_path('images/uploads/filedoc/' . $file->filedocname);

        // ตรวจสอบนามสกุลไฟล์
        $file_extension = pathinfo($file->filedocname, PATHINFO_EXTENSION);
        // dd($file_extension);
        // ตั้งค่าชื่อไฟล์ตามนามสกุลจริง
        $download_name = $file->filedoc_name;
        if (!str_ends_with($download_name, '.' . $file_extension)) {
            $download_name .= '.' . $file_extension;
        }

        // Check if the file actually exists on the server
        if (file_exists($file_path)) {
            return response()->download($file_path, $download_name);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }
}
