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
    public function add(Product $product)
    {
        $products = session('cart.products');

        if (isset($products[$product->id])) {
            $products[$product->id]['quantity'] = 1;
        }
        $products[$product->id]['quantity'] = 1;
        $products[$product->id] = $product;

        session()->put('cart.products', $products);

        return redirect('/');
    }

    public function index(Request $request)
    {
        if (!session()->has('cart.products')) {
            session()->put('cart.products', []);
        }
        
        $products = collect(session('cart')['products']);

        // dd($products);

        $totalPrice = $products->sum('subtotal');

        // dd($totalPrice);

        return view('cart.index')
                ->with('products', $products)
                ->with('totalPrice', $totalPrice);
    }

    public function remove($id, Request $request)
    {
        $products = session()->get('cart.products');
        $keys = array_keys($products);

        foreach($keys as $index){
            if($products[$index]['id'] == $id){
                session()->forget('cart.products.' . $index);
            }
        }

        return redirect(url('/cart'));

    }

    public function flush(Request $request)
    {
        $request->session('cart.products')->flush();
        return redirect('/cart');
    }

    public function update(Request $request)
    {   
        // dd($request->all());
        $cartProducts = collect(session('cart.products'));

        $updated = collect([]);

        if ($cartProducts) {
            foreach ($cartProducts as $value) {
                if ($value->id == $request->product_id) {
                    $value->quantity = $request->quantity;
                    $value->subtotal = $request->quantity * $value['price'];
                }

                $updated->push($value);
            }
        }

        // dd($updated);

        // dd($cartProducts);
        session()->put('cart.products', $updated);

        return redirect('/cart');
    }

}
