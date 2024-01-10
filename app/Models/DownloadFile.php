<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadFile extends Model
{
    use HasFactory;

    protected $table = 'download_file';

    protected $primaryKey = 'file_id';

    public static function findById($id)
    {
        return static::where('file_id', $id)->first();
    }
    
}
