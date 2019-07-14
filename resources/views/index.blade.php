@extends ('layouts.master')
@section ('title')
TechHub
@endsection
@section ('content')
@include ('layouts.partials.carousel')
<div class="container-fluid">
    <a href="/products" class="d-flex btn btn-primary __todos">Ver Catálogo Completo</a>
    <hr class="__sep_car-oft">
    
        <div class="col-12 text-center __productos_destacados">
            <p>
                Productos Destacados
            </p>
        </div>
        <div class="__cards_wrapper row">
        @if (isset($destacados))
        @foreach ($destacados as $product)
            <div class="__cards col-12 col-md-4 col-lg-3">
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
        @endif
</div>
@endsection