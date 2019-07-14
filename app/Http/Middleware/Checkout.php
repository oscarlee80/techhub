<?php

namespace App\Http\Middleware;

use Closure;

class Checkout
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
        $products = collect(session('cart.products'));

        if (count($products) == 0) {
            return redirect('/');
        }

        return $next($request);
    }
}
