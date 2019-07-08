<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $error = "No hay resultados";
        $keywords = $request->keywords;
        $results = Product::where('title', 'LIKE', "%$keywords%")->get();

        return view ('results')->with('results', $results)->with('keywords', $keywords);
    }
}
