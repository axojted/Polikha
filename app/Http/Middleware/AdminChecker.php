<?php

namespace App\Http\Middleware;

use Closure;

class AdminChecker
{
    public function handle($request, Closure $next)
    {
        if(auth()->check()){
            if(auth()->user()->user_role->role !== 1){
                return redirect()->back();
            }
        }else{
            return redirect('/');
        }
    }
}
