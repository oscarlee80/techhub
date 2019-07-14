@extends ('layouts.main')

@section ('title')
{{ $product->title }}
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
    <h2 >M O D I F I C A R</h2>
    <h2 >P R O D U C T O</h2>
    <hr width="380px">
    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        @method ('PATCH')
        <div class="form-group">
            <label for="title">Título</label>

            @error('title')
                <br>
                <span class="errores" role="alert" style="color:red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input name="title" value="{{ $product->title }}" type="text" class="form-control"  style="width : 330px;">
        </div>
        <div class="form-group">
            <label for="rating">Precio</label>

            @error('price')
                <br>
                <span class="errores" role="alert" style="color:red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input name="price" value="{{ $product->price }}" type="text" class="form-control"  style="width : 330px;">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripción</label>

            @error('description')
            <br>
                <span class="errores" role="alert" style="color:red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="4" style ="width: 330px">{{ $product->description }}</textarea>
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
                @if ($product->category)
                    <option value="{{$product->category->id}}" selected value>{{ $product->category->name }}</option>
                    @foreach ($categories as $category)
                        @if ($product->category->id !== $category->id)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                @else
                    <option disabled selected value>Seleccione una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                @endif

            </select>
        </div>
        <br>
        <label for="">Foto</label>
        <br>
        <label class="file">
            <input multiple="multiple" type="file" id="file" name="photos[]" aria-label="File browser example">
            <span class="file-custom"></span>
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
            <button type="submit" class="btn btn-success btn-lg" >Modificar producto</button>
        </div>
    </form>
</div>

@endsection