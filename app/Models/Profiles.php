<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $primarykey = 'user_id';
    
    protected $fillable = [
        'user_id',
        'lastname',
        'firstname',
        'identification',
        'advisor_email1',
        'advisor_email2',
        'firstname_en',
        'lastname_en'
      ];

    public function user()
    {
        return $this->belongsTo(Users::class,'id','user_id');
    }
}
