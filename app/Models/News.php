<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $primarykey = 'cmms_id';

    public static function findById($id)
    {
        return static::where('cms_id', $id)->first();
    }
    
}
