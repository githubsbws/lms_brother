<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentGroupPermission extends Model
{
    use HasFactory;

    protected $table = 'document_group_permissions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'filedoc_id','orgchart_id'
    ];

    const CREATED_AT = 'created_at'; 
    const UPDATED_AT = 'updated_at';

    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
    
}
