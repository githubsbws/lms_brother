<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imgslide extends Model
{
    use HasFactory;
    protected $table = 'imgslide';
    protected $primaryKey = 'imgslide_id';
    protected $fillable = ['imgslide_link','imgslide_picture'];
}
