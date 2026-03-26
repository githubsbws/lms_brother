<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentUserPermission extends Model
{
    use HasFactory;

    protected $table = 'document_user_permissions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'filedoc_id','user_id'
    ];

    const CREATED_AT = 'created_at'; 
    const UPDATED_AT = 'updated_at';

    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }

    
}
