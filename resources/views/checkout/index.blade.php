@extends('layouts.checkout')

@section('title')
    TechHub | Checkout
@endsection

@section('content')
<main class="container">
    <div class="">
        <h2 class="__title">
                Resumen de Compra
        </h2>
    </div>
    <div class="__data">
        <div class="__products">
            <h3>
                Producto(s)
            </h3>
            <hr>
            @foreach ($products as $product)
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                            <img class="img-responsive" src="{{asset('/storage/products/' . $product->dafaultPhoto)}}" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong>{{$product->title}}</strong></h4>
                            <h6>{{$product->description}}</h6>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong>$ {{number_format($product->price) }} <span class="text-muted">x</span> {{$product->quantity}}</strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">
                                <div class="quantity">
                                    <h6>
                                        <strong>
                                            $ {{number_format($product->price * $product->quantity) }}
                                        </strong>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
            @endforeach
        </div>
        <div class="__shipping">
            <h3>
                Datos de envio
            </h3>
            <hr>
            @foreach ($shipping as $item)
                <div class="country">
                    <strong>
                        Pais: 
                    </strong>
                        {{$item['country']}}
                </div>
                <div class="address">
                    <strong>
                        Calle: 
                    </strong>
                        {{$item['address']}}, {{$item['address_number']}}
                </div>
                <div class="zip_code">
                    <strong>
                        Codigo Postal: 
                    </strong>
                        {{$item['zip_code']}} 
                </div>
                <div class="phone">
                    <strong>
                        Telefono: 
                    </strong>
                        {{$item['phone']}} 
                </div>
            @endforeach
        </div>
        <hr>
        <div class="__payment">
            <h3>
                Datos de pago
            </h3>
            <hr>
            @foreach ($payment as $item)
            {{-- @dd($item) --}}
                <div class="card_holder">
                    <strong>
                        Titular de la tajeta: 
                    </strong>
                        {{$item['name']}}
                </div>
                <div class="card_number">
                    <strong>
                        Numero de tarjeta: 
                    </strong>
                        {{$item['card_number']}}
                </div>
                <div class="expired">
                    <strong>
                        Vencimiento de tarjeta (MM-AAAA): 
                    </strong>
                        {{$item['expired']}} 
                </div>
            @endforeach
            <hr>
        </div>
    </div>
    <div class="finish pull-right __cart_sum">
            <p>
                Tax: <b>$ {{number_format(0)}}</b>;
            </p>
            <p>
                Discounts: <b>$ {{number_format(0)}}</b>;
            </p>
            <p>
                Total price: <b>$ {{number_format($totalPrice)}}</b>
            </p>
        <a href="{{route('finalCheckout')}}" class="btn btn-success pull-right">Finalizar Compra</a>
    </div>
</main>
@endsection