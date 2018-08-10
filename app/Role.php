<?php

namespace App;
use App\Role;
use App\UserRole;

class Role extends Model
{
    public function user_role()
    {
        return $this->hasMany(UserRole::class);
    }
}
