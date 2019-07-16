@extends ('layouts/master')

@section ('title')
{{ $product->title }}
@endsection

@section ('content')
<br>
<img class="__productImage" src="/storage/products/{{ $product->defaultImage() }}" alt="imagen">
<br>

@if (count($product->photos()) > 1)
    <div class="container __thumbcontainer row">
        @for ($i = 0; $i < count($product->photos()); $i++)
<<<<<<< HEAD
        <a href="#">
        <img class="__thumbnails col-12" src="/storage/products/{{ $product->photos()[$i] }}" alt="imagen">
=======
        <a href="{{'#'.$i}}">
        <img class="__thumbnails" src="/storage/products/{{ $product->photos()[$i] }}" alt="imagen">
>>>>>>> a4b94c040378cf836517f48aa07f3343faa8da2a
        </a>
        @endfor
    </div>
@endif

<div class="card text-center m-auto __productDetails">
    <div class="card-body">
        <h3 class="card-title">{{ $product->title }}</h3>
        <hr width ="80%">
        <h4 class="card-title">$ {{ $product->price }}</h4>
        <hr width ="80%">
        <p class="card-text">{{ $product->description }}</p>
        <form action="/cart/add/{{ $product->id }}" method="GET">
            <label for="qty">Cantidad</label>
            <select name="quantity" style="width: 15%" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option selected value="1">1</option>
                @for($i = 2; $i <= 10; $i++){
                    <option value="{{ $i }}">{{ $i }}</option>
                }
                @endfor
            </select>
            <br>
            <br>
            <button type="submit" class="btn btn-primary __agregar">Agregar al carrito</button>
        </form>
    </div>
</div>
<br>
@endsection


