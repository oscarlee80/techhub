<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use DB;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use function GuzzleHttp\json_decode;
// use Symfony\Component\HttpFoundation\Session\Session;
// use App\Session;

class CartController extends Controller
{
    public function add(Product $product)
    {
        $products = collect(session('cart.products'));

        $product->quantity = 1;

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

        $this->saveCart();

        return redirect()->back();
    }

    public function index(Request $request)
    {

        if(auth()->user()){

            $user = User::find(auth()->user()->id);
    
            $cartProducts = json_decode($user->cart, true);
    
            $updated = collect([]);
    
            foreach($cartProducts as $product){
                $object = (object) $product;
                $updated->put($object->id, $object);
            }
    
            session()->put('cart.products', $updated);
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

        $this->saveCart();

        return redirect(url('/cart'));

    }

    public function flush(Request $request)
    {
        $request->session('cart.products')->forget('cart');

        $this->saveCart();

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
                    $value->subtotal = $request->quantity * $value->price;
                }
                $updated->put($value->id, $value);
            }
        }

        session()->put('cart.products', $updated);

        $this->saveCart();

        return redirect('/cart');
    }

    public static function saveCart()
    {
        $products = collect(session('cart.products'));

        $jsonCart = $products->toJson();

        DB::table('users')
            ->where('id', auth()->user()->id)
            ->update(['cart' => $jsonCart]);
    }

}
