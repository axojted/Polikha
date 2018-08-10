<?php

namespace App;

use App\Role;
use App\User;

class UserRole extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
