<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'file';

    protected $primarykey = 'id';

    protected $fillable = [
        'views',
        'lesson_id',
        'filename' ,
        'file_name',
    ];
    public $timestamps = false;
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }
}
