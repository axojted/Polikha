<?php

namespace App;
use App\User;
use App\Post;
class Reaction extends Model
{
    public function user()
    {
        return belongsTo(User::class);
    }
    public function posts()
    {
        return belongsTo(Post::class);
    }
}
