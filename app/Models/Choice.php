<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    protected $table = 'choice';

    protected $primarykey = 'choice_id';

    public static function findById($id)
    {
        return static::where('choice_id', $id)->first();
    }
}
