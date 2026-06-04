<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;

class LearnFile extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'learn_file';

    protected $primaryKey = 'learn_file_id';

    protected $fillable = [
        'learn_file_date',
        'learn_file_status' 
    ];

    public static function findById($id)
    {
        return static::where('learn_file_id', $id)->first();
    }

     public function file()
    {
        return $this->belongsTo(File::class, 'file_id', 'id');
    }
}
