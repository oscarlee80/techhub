@extends ('layouts/master')

@section ('title')
Catálogo Completo
@endsection

@section ('content')
<br>
<div class="container-fluid">
    <div class="col-12 text-center __productos_destacados">
        <p>
            Catálogo Completo
        </p>
    </div>
    @if (isset($products))
    <div class="__cards_wrapper row">
    @foreach ($products as $product)
        {{-- <div class="card col-6 col-md-3 col-lg-2 __itemoferta" style="width: 18rem;">
            <img src="storage/products/{{ $product->photos}}" class="card-img-top __imgofertas" alt="...">
            <div class="card-body">
                <p class="card-text o_tituloitems">{{ $product->title}}</p>
                <a href="#" class="d-flex btn btn-primary __comprar">${{ $product->price}}</a>
            </div>
        </div> --}}
        {{-- <div class="d-flex card col-6 col-md-3 col-lg-2 __itemoferta" style="width: 18rem;">
            <img src="{{asset('/storage/products/' . $product->photos)}}" class="card-img-top __imgofertas" alt="...">
            <div class="card-body">
                <h2 class="card-text o_tituloitems">{{ $product->title }}</h2>
                <p class="card-text __textoofertas">{{$product->description}}</p>
                <a href="#" class="d-flex btn btn-primary __comprar">{{$product->price}}</a>
            </div>
        </div> --}}
        <div class="__cards col-12 col-md-3 col-lg-2">
            <div class="__img_card">
                <img src="{{asset('/storage/products/' . $product->photos)}}" alt="">
            </div>
            <h2 class="o_tituloitems">{{ $product->title }}</h2>
            <p class="__textoofertas">{{$product->description}}</p>
            <a href="{{url('cart/add/' . $product->id)}}" class="d-flex btn btn-primary __comprar">{{$product->price}}</a>
        </div>
    @endforeach
    </div>
    @endif
</div>
{{-- {{ $products->links() }} --}}

@endsection
