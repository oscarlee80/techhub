@extends ('layouts.main')

@section ('title')
    Backoffice
@endsection

@section ('content')
<div class="container-fluid">
    <header class="container_header">
            <a href="/">
                <img class="img_logo" src="{{asset('/img/logo_techhub_5.png')}}" alt="logo">
            </a>
    </header>
    <br>
    <br>
    <h1 class="mt-5" align="center">Backoffice</h1>
    <br>
    <br>
    <div align="center">
        <a class="btn btn-outline-dark btn-lg" role="button" href="{{ route ('productCrud') }}">Administrar productos</a>
        <br>
        <br>
        <a class="btn btn-outline-dark btn-lg" role="button" href="{{ route ('categoriesCrud') }}">Administrar categorias</a>
        <br>
        <br>
        @if(auth()->user()->role === 9)
            <a  class="btn btn-outline-dark btn-lg" role="button" href="{{route('usersCrud')}}">Administrar usuarios</a>
        @endif
    </div>  
</div>
@endsection