<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Downloadcategoty extends Model
{
    use HasFactory;

    protected $table = 'download_categoty';

    protected $primaryKey = 'download_id';

    public static function findById($id)
    {
        return static::where('download_id', $id)->first();
    }
    
}
