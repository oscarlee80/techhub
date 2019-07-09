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
        $cartProducts = session('cart')['products'];

        if($cartProducts){
            $keys = array_keys($cartProducts);
            foreach ($keys as $index) {
                if($cartProducts[$index]['id'] !== $product->id){
                    // dd('aca');
                    $products = [
                        'id' => $product->id,
                        'title' => $product->title,
                        'price' => $product->price,
                        'photo' => $product->photos,
                        'quantity' => 1
                    ];
                }else{
                    return redirect()->back();
                }
            }
            
        }else {
            $products = [
                'id' => $product->id,
                'title' => $product->title,
                'price' => $product->price,
                'photo' => $product->photos,
                'quantity' => 1
            ];
        }
        

        session()->push('cart.products', $products);

        return redirect(url('/'));

    }

    public function index(Request $request)
    {
        $products = session('cart')['products'];
        
        $total = [];

        if ($products) { 
            $products = $request->session()->get('cart.products');
            $keys = array_keys($products);

            foreach ($keys as $index) {
                array_push($total, $products[$index]['price'] * $products[$index]['quantity']);
            }
        }
        $totalPrice = array_sum($total);

        return view('cart.index')
                ->with('products', $products)
                ->with('totalPrice', $totalPrice);
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
        return redirect('/cart');
    }

    public function update(Request $request)
    {   
        // dd($request->all());
        $cartProducts = session('cart')['products'];

        if ($cartProducts) {
            $products = $request->session()->get('cart.products');
            $keys = array_keys($products);

            foreach ($keys as $index) {
                if ($products[$index]['id'] == $request->product_id) {
                    $this->remove($request->product_id,  $request);
                    $products = [
                        'id' => $products[$index]['id'],
                        'title' => $products[$index]['title'],
                        'price' => $products[$index]['price'],
                        'photo' => $products[$index]['photo'],
                        'quantity' => $request->quantity
                    ];
                    session()->push('cart.products', $products);
                }

            }

            // return response()->json(['success' => true]);
            return redirect('/cart');
        }
    }

}
