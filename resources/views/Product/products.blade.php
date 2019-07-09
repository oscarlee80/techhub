@extends ('layouts/master')

@section ('title')
Catálogo Completo
@endsection

@section ('content')
<br>
<div class="__ofertas row container-fluid">
    <div class="col-12 text-center __productos_destacados">
        <p>
            Catálogo Completo
        </p>
    </div>
    @if (isset($products))
    @foreach ($products as $product)
        {{-- <div class="card col-6 col-md-3 col-lg-2 __itemoferta" style="width: 18rem;">
            <img src="storage/products/{{ $product->photos}}" class="card-img-top __imgofertas" alt="...">
            <div class="card-body">
                <p class="card-text o_tituloitems">{{ $product->title}}</p>
                <a href="#" class="d-flex btn btn-primary __comprar">${{ $product->price}}</a>
            </div>
        </div> --}}
        <div class="d-flex card col-6 col-md-3 col-lg-2 __itemoferta" style="width: 18rem;">
                <img src="{{asset('/storage/products/' . $product->photos)}}" class="card-img-top __imgofertas" alt="...">
                <div class="card-body">
                    <h2 class="card-text o_tituloitems">{{ $product->title }}</h2>
                    <p class="card-text __textoofertas">{{$product->description}}</p>
                    <a href="#" class="d-flex btn btn-primary __comprar">{{$product->price}}</a>
                </div>
            </div>
    @endforeach
    @endif
</div>
{{-- {{ $products->links() }} --}}

@endsection
