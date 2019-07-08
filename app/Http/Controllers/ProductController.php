<?php

namespace App\Http\Controllers;

use App\Product;

use App\Category;

use Illuminate\Http\File;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $limit = 10;
        $products = Product::all();

        return view ('product.products')->with ('products', $products);
    }

    public function create()
    {
        $categories = Category::all();

        return view('product.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photos' => 'required',
            'category_id' => 'required',
            'trending' => 'required',
            'active' => 'required',
        ];

        $messages = [
            'title.required' => 'El titulo es obligatorio',
            'description.required' => 'La descripción es obligatoria',
            'price.required' => 'El precio es obligatorio',
            'photos.required' => 'La foto es obligatoria',
            'category_id.required' => 'La categoría es obligatoria',
        ];

        $this->validate($request, $rules, $messages);

        // foreach ($request->paths as $photo) {
        //     $filename = $photo->store('product','public');
        //     Multimedia::create([
        //         'product_id' => $request->product_id,
        //         'path' => $filename
        //     ]);
        // }

        $photos = $request->file('photos')->store('products', 'public');
        $filename = basename($photos);
        $product = new Product($request->all());
        $product->photos = $filename;
        $product->save();
        return redirect('/backoffice/products');
    
    }

    public function show($id)
    {
    $product = Products::find($id);
    return view('product.show')->with('product$product', $product);
    }

    public function edit($id)
    {
    $categories = Category::all();
    $product = Product::find($id);

    return view('product.edit')
        ->with('product', $product)
        ->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
    $rules = [
        'title' => 'required',
        'description' => 'required',
        'price' => 'required',
        'category_id' => 'required',
        'trending' => 'required',
        'active' => 'required',
    ];

    $messages = [
        'title.required' => 'El titulo es obligatorio',
        'description.required' => 'La descripción es obligatoria',
        'price.required' => 'El precio es obligatorio',
        'category_id.required' => 'La categoría es obligatoria',
    ];

    $this->validate($request, $rules, $messages);

    $product = Product::find($id);
    $product->title = $request->input('title') !== $product->title ? $request->input('title') : $product->title;
    $product->price = $request->input('price') !== $product->price ? $request->input('price') : $product->price;
    $product->description = $request->input('description') !== $product->description ? $request->input('description') : $product->description;
    $product->category_id = $request->input('category_id') !== $product->category_id ? $request->input('category_id') : $product->category_id;
    $product->active = $request->input('active') !== $product->active ? $request->input('active') : $product->active;
    $product->trending = $request->input('trending') !== $product->trending ? $request->input('trending') : $product->trending;

    if ($request->file('photos') !== null) {
        unlink("storage/products/".$product->photos);
        $photos = $request->file('photos')->store('products', 'public');
        $filename = basename($photos);
        $product->photos = $filename;
    }

    $product->save();

    return redirect("/backoffice/products/");
    }

    public function destroy($id)
    {
        $product = Product::destroy($id);
        return redirect("/backoffice/products");
    }
}
