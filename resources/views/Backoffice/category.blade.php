@extends ('layouts/main')

@section ('title')
{{ $category->name }}
@endsection

@section ('content')
<br>
<br>
<br>
<br>
<header class="container_header">
        <a href="/">
            <img class="img_logo" src="{{asset('/img/logo_techhub_5.png')}}" alt="logo">
        </a>
</header>
<div class="__ofertas row container-fluid">
        <a class="btn btn-dark" href="/backoffice/categories" role ="button" style="color:white"><i class="fas fa-arrow-left"></i></a>
    <div class="col-12 text-center __productos_destacados">
        <hr width="100px">
        <h1>
            {{ $category->name }}
        </h1>
        <hr>
        <br>
    </div>
    @if (isset($category->products))
    @foreach ($category->products as $product)
    <div align="center">
        <div align="center" class="card" style="width: 18rem;">
            <img class="card-img-top" src="/storage/products/{{ $product->photos }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $product->title}}</h5>
                <p class="card-text">Descripcion : {{ $product->description}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Precio : $ {{ $product->price }}</li>
                <li class="list-group-item">Activo : {{ $product->active }}</li>
                <li class="list-group-item">Destacado : {{ $product->trending }}</li>
            </ul>
            <div class="card-body">
                
                <a href="/products/{{ $product->id }}/edit" type="" class="btn btn-primary" value="" ><i class="far fa-edit"></i></a>
                <form method="POST" action="/products/{{$product->id}}">
                    @method('DELETE')
                    @csrf
                    <button style="margin-top: 5px" type="submit" class="btn btn-danger" value="" ><i class="far fa-trash-alt"></i></button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
@endsection
