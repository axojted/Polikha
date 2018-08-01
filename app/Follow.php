<?php

namespace App;

use App\User;

class Follow extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
