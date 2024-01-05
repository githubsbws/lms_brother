<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learn extends Model
{
    use HasFactory;

    protected $table = 'learn';

    protected $primarykey = 'id';

    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
