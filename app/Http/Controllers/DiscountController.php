<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ___PHPSTORM_HELPERS\object;

class DiscountController extends Controller
{
    public function discount(Request $request)
    {
        if (!session()->has('cart.discounts')) {
            session()->put('cart.discounts', []);
        }

        $discount = (object) [];

        $discount->name = $request->discount_name;
        $discount->price = '';

        $discounts = collect(session('cart.discounts'));

        if($request->discount_name == 'carrizo'){

            $discount->price = 0.5;

            session()->put('cart.discounts', $discount);

            // dd(session('cart.discounts')->price);

        }

        return redirect('/cart');

    }
}
