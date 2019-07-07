<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($id)
    {
        $product = Product::find($id);

        $products = [
            'id' => $product->id,
            'title' => $product->title,
            'price' => $product->price
        ];

        session()->push('cart.products', $products);

        // $limit = 20;

        // $products = Product
        return redirect(url('/'));

    }

    public function index()
    {
        $products = session('cart')['products'];
        return view('cart.index')->with('products', $products);
    }

    public function remove($id, Request $request)
    {
        $products = $request->session()->get('cart.products');
        $keys = array_keys($products);

        foreach($keys as $index){
            if($products[$index]['id'] == $id){
                $request->session()->forget('cart.products.' . $index);
            }
        }

        return redirect(url('/cart'));

    }

    public function flush(Request $request)
    {
        $request->session('cart.products')->flush();
        return redirect('/');
    }

    public function show(Cart $cart)
    {
        //
    }

    public function edit(Cart $cart)
    {
        //
    }

    public function update(Request $request, Cart $cart)
    {
        //
    }

    public function destroy(Cart $cart)
    {
        //
    }
}
