@extends ('layouts.main')

@section ('title')
{{ $product->title }}
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
<div align="center">
    <div align="center" class="card" style="width: 18rem;">
        <img class="card-img-top" src="/storage/products/{{ $product->photos }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $product->title}}</h5>
            <p class="card-text">Descripcion : {{ $product->description}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Precio : $ {{ $product->price }}</li>
            <li class="list-group-item">Categoría : 
                @if ($product->category)
                {{ $product->category->name }}
                @else
                Sin Categoría
                @endif
            </li>
            <li class="list-group-item">Activo : {{ $product->active }}</li>
            <li class="list-group-item">Destacado : {{ $product->trending }}</li>
        </ul>
        <div class="card-body">
            <a class="btn btn-dark" href="/backoffice/products" role ="button" style="color:white"><i class="fas fa-arrow-left"></i></a>
            <a href="/products/{{ $product->id }}/edit" type="" class="btn btn-primary" value="" ><i class="far fa-edit"></i></a>
            <form method="POST" action="/products/{{$product->id}}">
                @method('DELETE')
                @csrf
                <button style="margin-top: 5px" type="submit" class="btn btn-danger" value="" ><i class="far fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
</div>

@endsection