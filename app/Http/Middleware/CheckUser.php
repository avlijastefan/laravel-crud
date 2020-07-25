<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param    $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {   
    
        if (Auth::guard($guard) && Auth::user()->access === 3) {
            abort(404);
        }
        
        return $next($request);
    }
}
