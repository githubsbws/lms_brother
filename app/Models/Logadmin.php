<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logadmin extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $connection = 'mysql_noprefix';

    protected $table = 'log_admin';

    protected $primaryKey = 'id';

    protected $fillable = [
        
    ];

    const CREATED_AT = 'create_date'; // Custom created_at column
    const UPDATED_AT = 'update_date'; // Custom update_at column

    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
