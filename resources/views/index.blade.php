@extends ('layouts.master')
@section ('title')
TechHub
@endsection
@section ('content')
@include ('layouts.partials.carousel')
<div class="container-fluid">
    <a href="/products" class="d-flex btn btn-primary __todos">Ver Catálogo Completo</a>
    <hr class="__sep_car-oft">
    <div class="__ofertas row">
        <div class="col-12 text-center __productos_destacados">
            <p>
                Productos Destacados
            </p>
        </div>
        @if (isset($destacados))
        @foreach ($destacados as $value)
            <div class="card col-12 col-md-4 col-lg-3 __itemoferta" style="width: 18rem;">
                <img src="/storage/products/{{ $value->photos }}" class="card-img-top __imgofertas" alt="IMAGEN">
                <div class="card-body">
                    <p class="card-text o_tituloitems">{{ $value->title }}</p>
                    <a href="#" class="d-flex btn btn-primary __comprar">${{ $value->price }}</a>
                </div>
            </div>
        @endforeach
        @endif
</div>
@endsection