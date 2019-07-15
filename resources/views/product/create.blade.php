@extends ('layouts.main')

@section ('title')
Nuevo Producto
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
    <a href="/backoffice/products" class="btn btn-dark btn-lg" role ="button" ><i class="fas fa-arrow-left"></i> Volver</a>
    <hr width="380px">
    <h2 >N U E V O</h2>
    <h2 >P R O D U C T O</h2>
    <hr width="380px">
    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>

            @error('title')
                <br>
                <span class="errores" role="alert" style="color:red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input name="title" value="{{ old('title') }}" type="text" class="form-control"  style="width : 330px;">
        </div>
        <div class="form-group">
            <label for="rating">Precio</label>

            @error('price')
                <br>
                <span class="errores" role="alert" style="color:red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input name="price" value="{{ old('price') }}" type="text" class="form-control"  style="width : 330px;">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripción</label>

            @error('description')
            <br>
                <span class="errores" role="alert" style="color:red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <textarea placeholder="Breve descripcion del producto" name="description" class="form-control" id="exampleFormControlTextarea1" rows="4" style ="width: 330px"></textarea>
        </div>


        <div class="form-group">
            <label for="category_id">Categoría</label>

            @error('category_id')
                <br>
                <span class="errores" role="alert" style="color:red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <select name="category_id" class="form-control" style="width : 330px;">
                <option disabled selected value>Elija la categoría</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <label class="file">
            <input type="file" id="file" name="photos[]" multiple="multiple" aria-label="File browser example">
            <span class="file-custom" id="fileUpload_name"></span>
        </label>

        @error('photos')
        <br>
        <span class="errores" role="alert" style="color:red">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

        <br>
        <br>
        <label for="active">Activo?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="active" id="exampleRadios1" value=1 checked>
            <label class="form-check-label" for="exampleRadios1">Si</label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="active" id="exampleRadios2" value=0>
            <label class="form-check-label" for="exampleRadios2">No</label>
        </div>
        <br>
        <label for="active">Destacado?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trending" id="exampleRadios1" value=1 >
                <label class="form-check-label" for="exampleRadios1">Si</label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="trending" id="exampleRadios2" value=0 checked>
                <label class="form-check-label" for="exampleRadios2">No</label>
            </div>
        <br>
        <hr align="center" width="380px">
        <div class="md-form mt-0">
            <button type="submit" class="btn btn-success btn-lg" >Agregar producto</button>
        </div>
    </form>
</div>

@endsection