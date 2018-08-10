<?php

namespace App;

use App\Post;
use App\User;
use App\Follow;
use App\Role;
use App\UserRole;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    public function follows()
    {
        return $this->hasMany(Follow::class);
    }
    public function user_role()
    {
        return $this->belongsTo(UserRole::class);
    }
}
