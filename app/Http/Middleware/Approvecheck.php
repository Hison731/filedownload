<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Approvecheck
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
        if(Auth::user()->approved == 1){
            return $next($request);
        } else {
            Auth::logout();
            return redirect(route('error'));
        }
    }
}
