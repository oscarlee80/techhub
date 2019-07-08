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
        <div class="card col-6 col-md-3 col-lg-2 __itemoferta" style="width: 18rem;">
                <img src="storage/products/{{ $product->photos}}" class="card-img-top __imgofertas" alt="...">
                <div class="card-body">
                    <p class="card-text o_tituloitems">{{ $product->title}}</p>
                    <a href="#" class="d-flex btn btn-primary __comprar">${{ $product->price}}</a>
                </div>
        </div>
        @endforeach
    @else
    <h3 align="center">No se encontraron resultados para:</h3>
    <h3 align="center">{{ $keywords }}</h3>
    @endif

</div>
@endsection