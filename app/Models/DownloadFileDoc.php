<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadFileDoc extends Model
{
    use HasFactory;

    protected $table = 'download_filedoc';

    protected $primaryKey = 'filedoc_id';

    public static function findById($id)
    {
        return static::where('filedoc_id', $id)->first();
    }
    
}
