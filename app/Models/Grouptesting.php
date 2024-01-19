<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grouptesting extends Model
{
    use HasFactory;

    protected $table = 'grouptesting';

    protected $primarykey = 'group_id';

    public static function findById($id)
    {
        return static::where('group_id', $id)->first();
    }
}
