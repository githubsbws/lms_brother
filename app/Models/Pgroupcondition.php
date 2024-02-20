<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pgroupcondition extends Model
{
    use HasFactory;
    protected $connection = 'mysql_noprefix';
    protected $table = 'p_group_permission';
    protected $prefix = '';
    protected $primaryKey = 'id';
    protected $fillable = [
        'permission',
        'create_by',               
        'update_by'
    ];

    const CREATED_AT = 'create_date'; // Custom created_at column
    const UPDATED_AT = 'update_date'; // Custom update_at column

    public static function fingById($id)
    {
        return static::where('id', $id)->first();
    }
}
