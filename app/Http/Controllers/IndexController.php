<?php

namespace App\Http\Controllers;

use App\Models\Downloadtitle;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Models\Imgslide;
use App\Models\DocumentUserPermission;
use App\Models\DownloadFile;
use App\Models\Downloadcategoty;
use App\Helpers\DocumentPermissionHelper;

class IndexController extends Controller
{
   public function index()
   {
      $userId = auth()->id();

      $news = News::where('active','y')
                  ->limit(4)
                  ->orderBy('create_date','DESC')
                  ->get();

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

      $img = Imgslide::where('active','y')->get();

      return view("index.index", [
         'news'     => $news,
         'download' => $filteredTitles,  
         'img'      => $img
      ]);
   }
}
