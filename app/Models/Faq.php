<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $connection = 'mysql_noprefix';

    protected $table = 'cms_faq';

    protected $prefix = '';

    protected $primarykey = 'faq_nid';

    public static function findById($id)
    {
        return static::where('faq_nid', $id)->first();
    }

    
    
}
