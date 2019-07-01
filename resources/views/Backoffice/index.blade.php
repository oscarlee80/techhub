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
    <h1 align="center">Backoffice</h1>
    <br>
    <br>
    <div align="center">
    <a href="{{ route ('productCrud') }}" type="button" class="btn btn-primary btn-lg">Administrar productos</a>
    <br>
    <br>
    <a href="{{ route ('categoriesCrud') }}"type="button" class="btn btn-primary btn-lg">Administrar categorias</a>
    <br>
    <br>
    <a type="button" class="btn btn-primary btn-lg">Administrar usuarios</a>
    </div>
</div>
@endsection