<?php

namespace App\Http\Middleware;

use Closure;

class AuthUser
{

    public function handle($request, Closure $next)
    {
        if(!auth()->user()){
            return redirect('/login');
        }
        return $next($request);
    }
}
