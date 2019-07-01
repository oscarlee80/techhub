<?php

namespace App\Http\Controllers;

use App\Product;

use App\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = 10;
        $products = Product::make()->paginate($limit);
        return view ('product.products')->with ('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $reglas = [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photos' => 'required',
            'category_id' => 'required',
            // 'trending' => 'required',
            // 'active' => 'required',
        ];

        $mensajes = [
            'title.required' => 'El titulo es obligatorio',
            'description.required' => 'La descripción es obligatoria',
            'price.required' => 'El precio es obligatorio',
            'photos.required' => 'La foto es obligatoria',
        ];
    
        //
        $this->validate($request, $reglas, $mensajes);

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
            // el metodo show() muestra un elemento/objeto individual. Puede ser el perfil de un usuario, 
    // un producto, o como en este caso, una pelicula.
    $movie = Movie::find($id);
    return view('movies.show')->with('movie', $movie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            // el metodo edit es la responsabilidad del controlador de mostrar la vista de edicion de un recurso.
    // Para cargar la vista de edicion, en este caso tengo que mandarla con la pelicula (con su ID) y ademas su genero actual buscandolo individualmente ($genre), MAS los posibles generos que puedan llegar a tomar su lugar ($genres)

    $genres = Genre::all();

    $movie = Movie::find($id);

    // si el encadenamiento de metodos se extiende mucho...
    // return view('movies.editmovie')->with('movie', $movie)->with('genre', $genre)->with('genres', $genres);
    // podemos acortarlo asi:
    return view('movies.edit')
        ->with('movie', $movie)
        ->with('genre', $movie->genre)
        ->with('genres', $genres);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            // Dejo este dd comentado para ir viendo los cambios!
    //dd($request->all());
    // Primero que nada, nos auto-robamos la validacion:
    $rules = [
        'title' => 'required',
        'rating' => 'required',
        'awards' => 'required',
        'length' => 'required',
        'release_date' => 'date|required',
        'genre_id' => 'required',
    ];
    $messages = [
        'required' => 'el campo :attribute es obligatorio',
    ];
    
    $this->validate($request, $rules, $messages);
    // La logica de hacer un update es la siguiente:
    // Tenemos el personaje A, que se llama Request, y el personaje B, que se 
    // llama Movie.
    // El personaje Request trae data que puede ser nueva o no, y el personaje Movie
    // se para adelante y dice "compara con todo lo que tengo yo". Si el valor de un 
    // campo de Request es igual a lo que ya tiene Movie, no hay cambio. Si es diferente,
    // Movie atrapa el cambio y lo guarda, borrando el dato que tenia antes.
    // En codigo:
    $movie = Movie::find($id);
    // Explicacion con el primer campo/atributo
     $movie->title = $request->input('title') !== $movie->title ? $request->input('title') : $movie->title;
     // El titulo va a ser igual a lo que salga de este if ternario.
     // El if ocurre antes del signo de pregunta, "lo que llega de Request, NO ES igual a lo que movie ya tiene?"
     // si NO es igual, pone lo que llego, si es igual, queda como esta.
     $movie->rating = $request->input('rating') !== $movie->rating ? $request->input('rating') : $movie->rating;
     $movie->awards = $request->input('awards') !== $movie->awards ? $request->input('awards') : $movie->awards;
     $movie->length = $request->input('length') !== $movie->length ? $request->input('length') : $movie->length;
     $movie->release_date = $request->input('release_date') !== $movie->release_date ? $request->input('release_date') : $movie->release_date;
     $movie->genre_id = $request->input('genre_id') !== $movie->genre_id ? $request->input('genre_id') : $movie->genre_id;
     //una vez que terminamos el proceso anterior, simplemente hacemos:
     $movie->save();
     // y vamos a ver los cambios:
     return redirect("/movies/" . $movie->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
