<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class Users extends AuthenticatableUser implements Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'id';

    public function Profiles()
    {
        return $this->hasOne(Profiles::class);
    }
    public function isAdmin()
{
    return $this->superuser;
}
}
