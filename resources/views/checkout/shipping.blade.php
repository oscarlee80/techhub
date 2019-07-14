@extends('layouts.checkout')

@section('title')
    TechHub | Shipping
@endsection

@section('content')
    <main class="__checkout">
        <div class="container_signup">
            <div class="form_header">
                <div class="signup_title">
                    Datos de Envio
                </div>
            <div class="signup_section">
                <div class="form_content">
                    <form class="form_signup" action="{{ route('checkoutShipping') }}" method="POST">
                            @csrf
                        <div class="country row">    
                            {{-- <select name="" id="">
                                <option value="" selected disabled>Pais</option>
                                @foreach($allCountries as $country)
                                    @if($country['admin'])
                                        <option value="{{$country['admin']}}">
                                            {{$country['adm0_a3'] . ' - ' . $country['admin']}}
                                        </option>
                                    @endif
                                @endforeach
                            </select> --}}
                            <div class=""select>
                                <select name="country">
                                    <option value="" selected disabled>Pais</option>
                                    @foreach($allCountries as $country)
                                        @if($country['admin'])
                                            <option value="{{$country['admin']}}">
                                                {{$country['adm0_a3'] . ' - ' . $country['admin']}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="errores" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="address">
                                <input class="input_change @error('address') is-invalid @enderror" type="text" name="address" required value="{{ old('address') }}" autofocus>
                                <label>Calle</label>

                                @error('address')
                                    <span class="errores" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        <div class="nombre-apellido">
                            <div class="address_number">
                                <input class="input_change @error('address_number') is-invalid @enderror" type="number" name="address_number" required value="{{ old('address_number') }}">
                                <label>Nro.</label>
                                
                                @error('address_number')
                                    <span class="errores" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="zip_code">
                                <input class="input_change @error('zip_code') is-invalid @enderror" type="number" name="zip_code" required value="{{ old('zip_code') }}">
                                <label>Codigo Postal.</label>
                                
                                @error('zip_code')
                                    <span class="errores" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="phone">
                            <input class="input_change @error('phone') is-invalid @enderror" type="tel" name="phone" required value="{{ old('phone') }}">
                            <label>Telefono</label>

                            @error('phone')
                                <span class="errores" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <input class="submit_button" type="submit" name="" value="Continuar">
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection