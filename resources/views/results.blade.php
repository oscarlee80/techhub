@extends ('layouts/master')

@section ('title')
Resultados de : {{ $keywords }}
@endsection

@section ('content')
<br>
<div class="__ofertas row container-fluid">
    <div class="col-12 text-center __productos_destacados">
    @if (count($results) > 0)
        <h3>
            Resultados de : {{ $keywords }}
        </h3>
    </div>
        @foreach ($results as $product)
        <div class="__cards col-12 col-md-3 col-lg-2">
            <div class="__img_card">
                <img src="{{asset('/storage/products/' . $product->defaultImage()) }}" alt="">
            </div>
            <a href="{{ url("products/".$product->id) }}">
            <h2 class="o_tituloitems">{{ $product->title }}</h2>
            </a>
            <p class="__textoofertas">{{$product->description}}</p>
            <a href="{{url('cart/add/' . $product->id)}}" class="d-flex btn btn-primary __comprar">{{$product->price}}</a>
        </div>
        @endforeach
    @else
    <h3 align="center">No se encontraron resultados para:</h3>
    <h3 align="center">{{ $keywords }}</h3>
    @endif

</div>
@endsection