<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lesson';

    protected $primarykey = 'id';
    protected $fillable = [
        'course_id',
        'title' ,
        'description',
        'view_all' ,
        'cate_amount',
        'time_test',
        'content',
        'image',
    ];
    public $timestamps = false;

    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }

    public static function findBycourseId($id)
    {
        return static::where('course_id', $id)->first();
    }

    public function file()
    {
        return $this->hasMany(File::class, 'lesson_id', 'id');
    }
    public function filedoc()
    {
        return $this->hasMany(FileDoc::class, 'lesson_id', 'id');
    }
}
