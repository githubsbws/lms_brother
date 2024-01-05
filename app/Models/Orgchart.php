<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orgchart extends Model
{
    use HasFactory;

    protected $table = 'orgchart';

    protected $primarykey = 'id';

    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
