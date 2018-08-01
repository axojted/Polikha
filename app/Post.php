<?php

namespace App;

use App\User;
use App\Reaction;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
}
