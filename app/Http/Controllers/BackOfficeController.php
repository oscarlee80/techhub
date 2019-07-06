<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

use App\User;

class BackOfficeController extends Controller
{
    public function index()
    {
        return view('backoffice.index');
    }

    public function products()
    {
        $limit = 20;
        $products = Product::make()->paginate($limit)->sortBy('title');
        return view ('backoffice.products')->with('products', $products);
    }

    public function categories()
    {
        $limit = 20;
        $categories = Category::make()->paginate($limit)->sortBy('name');
        return view ('backoffice.categories')->with('categories', $categories);
    }

    public function users()
    {
        $limit = 20;
        $users = User::make()->paginate($limit)->sortBy('last_name');
        return view('backoffice.users')->with('users', $users);
    }

    public function showUser($id)
    {
        $user = User::find($id);

        return view('users.show')->with('user', $user);
    }

    public function editUser($id)
    {
        dd('llguw');
    }

    public function updateUser(Request $request)
    {

    }
}
