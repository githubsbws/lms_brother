<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pgroup extends Model
{
    use HasFactory;
    protected $connection = 'mysql_noprefix';
    protected $table = 'p_group';
    protected $prefix = '';
    protected $primaryKey = 'pgroup_id';
    protected $fillable = [
        'group_name',
        'active',
        'create_by',               
        'update_by'
    ];

    const CREATED_AT = 'create_date'; // Custom created_at column
    const UPDATED_AT = 'update_date'; // Custom update_at column

    public static function fingById($id)
    {
        return static::where('pgroup_id', $id)->first();
    }
}
