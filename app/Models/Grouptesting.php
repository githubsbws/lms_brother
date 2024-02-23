<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grouptesting extends Model
{
    use HasFactory;

    protected $table = 'grouptesting';

    protected $primaryKey = 'group_id';

    protected $fillable = [
        'step_id',
        'active'
    ];


    const CREATED_AT = 'create_date'; // Custom created_at column
    const UPDATED_AT = 'update_date'; // Custom update_at column

    public static function findById($id)
    {
        return static::where('group_id', $id)->first();
    }
}
