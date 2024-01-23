<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'question';

    protected $primarykey = 'ques_id';

    public static function findById($id)
    {
        return static::where('ques_id', $id)->first();
    }
}
