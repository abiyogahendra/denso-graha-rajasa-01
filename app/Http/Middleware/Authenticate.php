<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */


    public function handle($request, Closure $next)
    {
        dd('dd');
        
        if (!Auth::check()){
            return redirect()->route('login');
        }
        return $next($request);
    }

    // protected function redirectTo($request)
    // {
    //     if (!$request->expectsJson()) {
    //         return route('login-direction');
    //     }
    // }
}
