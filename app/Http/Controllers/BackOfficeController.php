<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

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
}
