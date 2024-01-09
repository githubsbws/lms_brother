<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'file';
    protected $fillable = [
        'lesson_id',
        'filename' ,
        'file_name',
    ];
    public $timestamps = false;
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }
}
