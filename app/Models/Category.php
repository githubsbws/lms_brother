<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $primarykey = 'cate_id';

    public static function findById($id)
    {
        return static::where('cate_id', $id)->first();
    }
}
