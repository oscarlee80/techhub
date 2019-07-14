@extends('layouts.onlyNav')

@section('title')
    TechHub | Cart
@endsection
@section('content')
    @if(count($products) == 0)
        <div class="__not_login">
            <h3>Su Carrito esta vacio...</h3>
            <p class="already_user">
            Su Carrito se encuentra vacio, inicia sesión para sicronizar los productos. 
                <a  href="{{url('/login')}}">Iniciar sesión</a>
            </p>
        </div>      
    @else    
        <div class="container-fuid">
            <div class="card __shopping-cart">
                <div class="card-body">
                            <!-- PRODUCT -->
                    @foreach ($products as $product)
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                            <img class="img-responsive" src="{{asset('/storage/products/' . $product->photos)}}" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong>{{$product->title}}</strong></h4>
                            <h6>{{$product->description}}</h6>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong>$ {{number_format($product->price * $product->quantity) }} <span class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">
                                <div class="quantity">
                                    <form id="form_{{$product->id}}" product_id="{{$product->id}}" class="form_quantity" action="{{route('cart.update')}}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="number" step="1" max="99" min="1" class="product_quantity" name="quantity" value="{{$product->quantity}}" title="Qty" class="qty" size="4">
                                        {{-- <input type="submit" style="height:0; width:0; opacity:1;"> --}}
                                    </form>
                                </div>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <a href="{{url('cart/remove/' . $product->id)}}" type="" class="btn btn-outline-danger" value="" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <hr>
                        <!-- END PRODUCT -->
                </div>
                <div class="card-footer pull-rigth">
                    <div class="__coupon col-md-5 col-sm-5 no-padding-left pull-left">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control __coupon_numbre" placeholder="cupone code">
                            </div>
                            <div class="col-6">
                                <input type="submit" class="btn btn-default" value="Use cupone">
                            </div>
                        </div>
                    </div>
                    <div class="pull-right" style="margin: 10px">
                        <a href="" class="btn btn-success pull-right">Checkout</a>
                        <a href="{{url('cart/flush')}}" class="btn btn-danger pull-right">Vaciar Carrito</a>

                        <div class="pull-right __cart_sum" style="margin: 5px">
                            <p>
                                Tax: <b>$ {{number_format(0)}}</b>;
                            </p>
                            <p>
                                Discounts: <b>$ {{number_format(0)}}</b>;
                            </p>
                            <p>
                                Total price: <b>$ {{number_format($totalPrice)}}</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection