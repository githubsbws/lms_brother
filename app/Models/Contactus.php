<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'contactus';

    protected $primaryKey = 'contac_id';

    public static function findById($id)
    {
        return static::where('contac_id', $id)->first();
    }
}
