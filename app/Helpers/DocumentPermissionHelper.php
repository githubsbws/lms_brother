<?php

namespace App\Helpers;

use App\Models\DocumentUserPermission;
use App\Models\OrgchartUser;
use App\Models\DocumentGroupPermission;
use App\Models\Downloadcategoty;
use App\Models\DownloadFile;
use App\Models\DownloadFileDoc;

class DocumentPermissionHelper
{
    public static function userHasPermission($filedoc_id, $user_id)
    {
        $userPerm = DocumentUserPermission::where('filedoc_id', $filedoc_id)
                    ->where('user_id', $user_id)
                    ->exists();

        if ($userPerm) {
            return true;
        }

        $userOrgcharts = OrgchartUser::where('user_id', $user_id)
                            ->pluck('orgchart_id');

        return DocumentGroupPermission::where('filedoc_id', $filedoc_id)
                ->whereIn('orgchart_id', $userOrgcharts)
                ->exists();
    }

    public static function userHasCategoryPermission($download_id, $user_id)
    {
         $filedocIds = DownloadFileDoc::select('download_filedoc.filedoc_id')
        ->join('download_file', 'download_file.file_id', '=', 'download_filedoc.file_id')
        ->where('download_file.download_id', $download_id)  
        ->where('download_file.active', 'y')
        ->where('download_filedoc.active', 'y')
        ->pluck('download_filedoc.filedoc_id');


        foreach ($filedocIds as $filedoc_id) {
            if (self::userHasPermission($filedoc_id, $user_id)) {
                return true; 
            }
        }

        return false; 
    }
}