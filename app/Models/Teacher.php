<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teacher';

    protected $primarykey = 'teacher_id';

    public static function findById($id)
    {
        return static::where('teacher_id', $id)->first();
    }
}
