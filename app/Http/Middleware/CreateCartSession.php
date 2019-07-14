<?php

namespace App\Http\Middleware;

use Closure;

class CreateCartSession
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
        if (!session()->has('cart.products')) {
            session()->put('cart.products', []);
        }
        
        return $next($request);
    }
}
