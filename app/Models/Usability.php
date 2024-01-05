<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usability extends Model
{
    use HasFactory;

    protected $table = 'usability';

    protected $primarykey = 'usa_id';

    public static function findById($id)
    {
        return static::where('usa_id', $id)->first();
    }
    
}
