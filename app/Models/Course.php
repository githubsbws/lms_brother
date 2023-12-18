<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course_online';

    protected $primarykey = 'course_id';

    public static function findById($id)
    {
        return static::where('course_id', $id)->first();
    }
}
