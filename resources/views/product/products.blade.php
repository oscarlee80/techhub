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
    </div>
    @endif
</div>
{{-- {{ $products->links() }} --}}

@endsection
