<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'file';

    protected $primarykey = 'id';

    protected $fillable = [
        'views'
    ];

    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
    
}