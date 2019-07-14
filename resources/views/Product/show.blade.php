@extends ('layouts/master')

@section ('title')
{{ $product->title }}
@endsection

@section ('content')
<br>
<img class="__productImage" src="/storage/products/{{ $product->defaultImage() }}" alt="imagen">
<br>
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
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <br>
            <br>
            <button type="submit" class="btn btn-primary __agregar">Agregar al carrito</button>
        </form>
    </div>
</div>
<br>
@endsection


