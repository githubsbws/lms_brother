<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Questionnaireout extends Model
{
    use HasFactory;
    protected $connection = 'mysql_noprefix';
    protected $table = 'q_survey_headers';
    protected $prefix = '';
    protected $primaryKey = 'survey_header_id';
    protected $fillable = [
        'survey_name',
        'instructions',
        'active'
    ];
    
    public $timestamps = false;

    public static function fingById($id)
    {
        return static::where('survey_header_id', $id)->first();
    }
}