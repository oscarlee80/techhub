@extends('layouts.onlyNav')

@section('title')
    TechHub | Cart
@endsection
{{-- @dd($totalPrice) --}}
@section('content')
    @if(!$products)
        <div class="already_user">
            <h3>Su Carrito esta vacio...</h3>
            <p class="already_user">
            Su Carrito esta vacio, inicia sesión para sicronizar los productos. 
                <a  href="{{url('/login')}}">Iniciar sesión</a>
            </p>
        </div>      
    @else    
        <div class="container-fuid">
            <div class="card shopping-cart" style="display:block;">
                <div class="card-body">
                            <!-- PRODUCT -->
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="{{asset('/storage/products/' . $product['photo'])}}" alt="prewiew" width="120" height="80">
                            </div>
                            <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                <h4 class="product-name"><strong>{{$product['title']}}</strong></h4>
                            </div>
                            <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                                <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                    <h6><strong>{{$product['price']}} <span class="text-muted">x</span></strong></h6>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <div class="quantity">
                                        <input type="button" value="+" class="plus">
                                        <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                            size="4">
                                        <input type="button" value="-" class="minus">
                                    </div>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2 text-right">
                                    <a href="{{url('cart/remove/' . $product['id'])}}" type="" class="btn btn-outline-danger" value="" >
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                        <!-- END PRODUCT -->
                    <div class="pull-right">
                        <a href="" class="btn btn-outline-secondary pull-right">
                            Update shopping cart
                        </a>
                    </div>
                </div>
                    <div class="card-footer pull-rigth">
                        <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="cupone code">
                                </div>
                                <div class="col-6">
                                    <input type="submit" class="btn btn-default" value="Use cupone">
                                </div>
                            </div>
                        </div>
                        <div class="pull-right" style="margin: 10px">
                            <a href="" class="btn btn-success pull-right">Checkout</a>
                            <a href="{{url('cart/flush')}}" class="btn btn-danger pull-right">Vaciar Carrito</a>

                            <div class="pull-right" style="margin: 5px">
                                Total price: <b>${{$totalPrice}}</b>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @endif
@endsection