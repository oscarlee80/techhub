<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Cart;
use PragmaRX\Countries\Package\Countries;
use function GuzzleHttp\json_encode;

class CheckoutController extends Controller
{
    public function finalCheckout()
    {
        $products = collect(session('cart.products'));

        $totalPrice = $products->sum('subtotal');

        $products = json_encode(session('cart.products'));
        
        $shipping = json_encode(session('cart.shipping'));

        $payment = json_encode(session('cart.payment'));
        
        $cart = new Cart;

        $cart->user_id = auth()->user()->id;
        $cart->products = $products;
        $cart->shipping = $shipping;
        $cart->payment = $payment;
        $cart->price = $totalPrice;

        // dd($cart);
        $cart->save();
        // dd(session('cart'));
        session()->forget('cart');
        // dd(session('cart'));

        DB::table('users')
            ->where('id', auth()->user()->id)
            ->update(['cart' => null]);

        return redirect('/');
    }

    public function index()
    {
        $products = session('cart.products');

        
        $totalPrice = $products->sum('subtotal');
        
        $shipping = session('cart.shipping');
        
        $payment = session('cart.payment');

        return view('checkout.index')
            ->with('products', $products)
            ->with('shipping', $shipping)
            ->with('payment', $payment)
            ->with('totalPrice', $totalPrice);
    }

    public function shipping()
    {
        $countries = new Countries();

        $allCountries = $countries->all();    

        return view('checkout.shipping')->with('allCountries', $allCountries);
    }

    public function saveShipping(Request $request)
    {
        
        $rules = [
        //     'country' => 'required',
        //     'adress' => 'required',
        //     'adress_numbre' => 'required',
        //     'zip_code' => 'required',
        //     'phone' => 'required'
        ];
        
        $message = [
            'required' => 'Campo obligatorio'
        ];
        
        $this->validate($request, $rules, $message);
        // dd('hola');
        
        $jsonShipping = $request->all();

        if (!session()->has('cart.shipping')) {
            session()->put('cart.shipping', []);
        }

        $shipping = collect(session('cart.shipping'));

        $shipping[auth()->user()->id] = $jsonShipping;

        session()->put('cart.shipping', $shipping);

        // dd(session('cart'));
        
        return redirect('/checkout/payment');
    }

    public function payment()
    {
        return view('checkout.payment');
    }

    public function savePayment(Request $request)
    {
        if (!session()->has('cart.payment')) {
            session()->put('cart.payment', []);
        }

        $jsonPayment = $request->all();

        $payment = collect(session('cart.payment'));

        $payment[auth()->user()->id] = $jsonPayment;

        session()->put('cart.payment', $payment);

        // dd(session('cart'));

        return redirect('/checkout/summary');
    }
}

