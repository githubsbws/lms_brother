<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ques_ans extends Model
{
    use HasFactory;

    protected $connection = 'mysql_noprefix';

    protected $table = 'q_quest_ans';

    protected $prefix = '';

    protected $primarykey = 'id';

    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
