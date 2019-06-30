@extends ('layouts.master')
@section ('title')
TechHub
@endsection
@section ('content')
@include ('layouts.partials.carousel')
<div class="container-fluid">
    <a href="/products" class="d-flex btn btn-primary __todos">Ver Catalogo Completo</a>
    <hr class="__sep_car-oft">
    <div class="__ofertas row">
        <div class="col-12 text-center __productos_destacados">
            <p>
                Productos Destacados
            </p>
        </div>
        @if (isset($trending))
        @foreach ($trending as $value)
            <div class="card col-12 col-md-4 col-lg-3 __itemoferta" style="width: 18rem;">
                <img src="img/{{ $value['avatar'] }}" class="card-img-top __imgofertas" alt="...">
                <div class="card-body">
                    <p class="card-text o_tituloitems">{{ $value['title'] }}</p>
                    <a href="#" class="d-flex btn btn-primary __comprar">${{ $value['price'] }}</a>
                </div>
            </div>
        @endforeach
        @endif
</div>
@endsection