<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq_type extends Model
{
    use HasFactory;

    protected $connection = 'mysql_noprefix';

    protected $table = 'cms_faq_type';
    
    protected $prefix = '';

    protected $primarykey = 'faq_type_id';

    public static function findById($id)
    {
        return static::where('faq_type_id', $id)->first();
    }
    
}
