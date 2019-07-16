@extends('layouts.checkout')

@section('title')
    TechHub | Payments
@endsection

@section('content')
    <main class="__checkout">
        <div class="container_signup">
            <div class="form_header">
                <div class="signup_title">
                    Datos de Pago
                </div>
            <div class="signup_section">
                <div class="form_content">
                    <form class="form_signup" id="payment-form" action="{{ route('checkoutProduct') }}" method="POST">
                        @csrf

                        <div class="cardholder_name">
                            <input class="input_change @error('name') is-invalid @enderror" type="text" name="name" required value="{{ old('name') }}">
                            <label>Nombre del titular</label>

                            @error('name')
                                <span class="errores" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="card_number">
                                <input class="input_change @error('card_number') is-invalid @enderror" type="text" name="card_number" id="card_number" required value="{{ old('card_number') }}" autofocus>
                                <label>Número de Terjeta</label>

                                @error('card_number')
                                    <span class="errores" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                        <div class="nombre-apellido">
                            <div class="expired">
                                <input class="input_change @error('expired') is-invalid @enderror" type="text" name="expired" id="expired_date" required value="{{ old('expired') }}">
                                <label>Expired (MM-AAAA)</label>
                                
                                @error('expired')
                                    <span class="errores" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="cvv">
                                <input class="input_change @error('cvv') is-invalid @enderror" type="number" name="cvv" id="cvv" required value="{{ old('cvv') }}">
                                <label>CVV</label>
                                
                                @error('cvv')
                                    <span class="errores" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <input class="submit_button" id="submit-register" type="submit" name="" value="Continuar">
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection