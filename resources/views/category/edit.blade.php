
@extends ('layouts.main')

@section ('title')
{{ $category->name }}
@endsection

@section ('content')
<br>
<br>
<br>
<br>
<header class="container_header">
        <a href="/">
            <img class="img_logo" src="{{asset('/img/logo_techhub_5.png')}}" alt="logo">
        </a>
</header>
<div align="center">
    <br>
    <a href="/backoffice/categories" class="btn btn-dark btn-lg" role ="button" ><i class="fas fa-arrow-left"></i> Volver</a>
    <hr width="380px">
    <h2 >M O D I F I C A R</h2>
    <h2 >C A T E G O R Í A</h2>
    <hr width="380px">
    <form method="POST" action="">
        @csrf
        @method ('PATCH')
        <div class="form-group">
            <label for="name">Nombre</label>

            @error('name')
                <br>
                <span class="errores" role="alert" style="color:red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input name="name" value="{{ old('name') }}" type="text" class="form-control"  style="width : 330px;">
        </div>
        <br>
        <hr align="center" width="380px">
        <div class="md-form mt-0">
            <button type="submit" class="btn btn-success btn-lg" >Modificar producto</button>
        </div>
    </form>
</div>
@endsection
