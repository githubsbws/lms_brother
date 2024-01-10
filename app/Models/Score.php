<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $table = 'score';

    protected $primarykey = 'score_id';

    public static function findById($id)
    {
        return static::where('score_id', $id)->first();
    }
}
