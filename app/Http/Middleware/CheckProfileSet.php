<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class CheckProfileSet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->check()){
            if(!DB::table('update_username')->find(auth()->id())){
                return redirect('set-profile');
            }else{
                return redirect('/');
            }
        }
    }
}
