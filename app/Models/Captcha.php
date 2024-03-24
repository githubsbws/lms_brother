<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Captcha extends Model
{
    use HasFactory;
    protected $connection = 'mysql_noprefix';

    protected $table = 'config_captcha';

    protected $prefix = '';

    protected $primaryKey = 'cap_id';
    
    protected $fillable = [
        'cap_active'
        
    ];
    const CREATED_AT = 'create_date'; // Custom created_at column
    const UPDATED_AT = 'update_date'; // Custom update_at column

    public static function findById($id)
    {
        return static::where('cap_id', $id)->first();
    }
}
