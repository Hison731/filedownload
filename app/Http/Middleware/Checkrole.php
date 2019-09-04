<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Checkrole
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
        if(Auth::user()->role_id != 1){
            return redirect(route('myaccount'));
        } else {
            return $next($request);
        }

    }
}
