<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Downloadtitle extends Model
{
    use HasFactory;

    protected $table = 'download_title';

    protected $primaryKey = 'title_id';

    public static function findById($id)
    {
        return static::where('title_id', $id)->first();
    }
    
}
