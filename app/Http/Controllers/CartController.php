<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

// use Symfony\Component\HttpFoundation\Session\Session;

// use App\Session;

class CartController extends Controller
{
    public function add(Product $product, Request $request)
    {
        $products = collect(session('cart.products'));

        if ($request->quantity) {
            $product->quantity = $request->quantity;
        } else {
            $product->quantity = 1;
        }

        if(count($products) !== 0){
            
            foreach ($products as $value) {
                if ($value->id == $product->id) {
                    $product->quantity = $value->quantity + 1;
                }
                $products[$product->id] = $product;
            }

        }else{
            $products[$product->id] = $product;
        }

        $product->subtotal = $product->quantity * $product->price;

        session()->put('cart.products', $products);

        return redirect()->back();
    }

    public function index(Request $request)
    {
        if (!session()->has('cart.products')) {
            session()->put('cart.products', []);
        }
        
        $products = collect(session('cart.products'));

        $totalPrice = $products->sum('subtotal');

        return view('cart.index')
                ->with('products', $products)
                ->with('totalPrice', $totalPrice);
    }

    public function remove($id, Request $request)
    {
        $products = session('cart.products');

        foreach($products as $value){
            if($products[$value->id]->id == $id){
                session('cart.products')->forget($id);
            }
        }

        return redirect(url('/cart'));

    }

    public function flush(Request $request)
    {
        $request->session('cart.products')->forget('cart');
        return redirect('/cart');
    }

    public function update(Request $request)
    {   
        $cartProducts = collect(session('cart.products'));

        $updated = collect([]);

        if ($cartProducts) {
            foreach ($cartProducts as $value) {
                if ($value->id == $request->product_id) {
                    $value->quantity = $request->quantity;
                    $value->subtotal = $request->quantity * $value['price'];
                }
                $updated->put($value->id, $value);
            }
        }

        session()->put('cart.products', $updated);

        return redirect('/cart');
    }

}
