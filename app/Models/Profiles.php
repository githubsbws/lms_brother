<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $primarykey = 'user_id';

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
