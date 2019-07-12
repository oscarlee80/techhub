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
            {{-- <div class="card col-12 col-md-4 col-lg-3 __itemoferta" style="width: 18rem;">
                <img src="/storage/products/{{ $product->photos }}" class="card-img-top __imgofertas" alt="IMAGEN">
                <div class="card-body">
                    <p class="card-text o_tituloitems">{{ $product->title }}</p>
                    <a href="#" class="d-flex btn btn-primary __comprar">${{ $product->price }}</a>
                </div>
            </div> --}}
            {{-- <div class="d-flex card col-12 col-md-4 col-lg-3 __itemoferta" style="width: 18rem;">
                <img src="{{asset('/storage/products/' . $product->photos)}}" class="card-img-top __imgofertas" alt="...">
                <div class="card-body">
                    <h2 class="card-text o_tituloitems">{{ $product->title }}</h2>
                    <p class="card-text __textoofertas">{{$product->description}}</p>
                    <a href="#" class="d-flex btn btn-primary __comprar">{{$product->price}}</a>
                </div>
            </div> --}}
            <div class="__cards col-12 col-md-4 col-lg-3">
                <div class="__img_card">
                    <img src="{{asset('/storage/products/' . $product->photos)}}" alt="">
                </div>
                <h2 class="o_tituloitems">{{ $product->title }}</h2>
                <p class="__textoofertas">{{$product->description}}</p>
                <a href="{{url('cart/add/' . $product->id)}}" class="d-flex btn btn-primary __comprar">{{$product->price}}</a>
            </div>
        @endforeach
        @endif
</div>
@endsection