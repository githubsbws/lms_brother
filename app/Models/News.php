<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $primarykey = 'cms_id';

    protected $fillable = [ 'cms_title','cms_short_title','cms_picture','create_date','create_by','update_date','update_by','active'];

    const CREATED_AT = 'create_date'; // Custom created_at column
    const UPDATED_AT = 'update_date'; // Custom update_at column

    public static function findById($id)
    {
        return static::where('cms_id', $id)->first();
    }
    
}
