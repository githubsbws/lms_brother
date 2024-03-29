<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class QQuestion extends Model
{
    use HasFactory;
    protected $connection = 'mysql_noprefix';
    protected $table = 'q_questions';
    protected $prefix = '';
    protected $primaryKey = 'question_id';
    protected $fillable = [
        'survey_section_id',
        'input_type_id',
        'question_name',
        'answer_required_yn',
        'allow_multiple_option_answers_yn' 
    ];
    
    public $timestamps = false;

    public static function fingById($id)
    {
        return static::where('question_id', $id)->first();
    }
}
