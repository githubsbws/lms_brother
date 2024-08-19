<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ASC extends Model
{
    use HasFactory;
    protected $connection = 'mysql_noprefix';

    protected $table = 'asc';

    protected $prefix = '';

    protected $primaryKey = 'id';
    
    public $timestamps = false;

    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
