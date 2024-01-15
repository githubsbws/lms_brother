<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manage extends Model
{
    use HasFactory;

    protected $table = 'manage';

    protected $primarykey = 'manage_id';

    public static function findById($id)
    {
        return static::where('manage_id', $id)->first();
    }
}
