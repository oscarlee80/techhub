@extends ('layouts.main')

@section ('title')
    Nuevo Producto
@endsection

@section ('content')
    <main>
        <a href="{{route ('productCrud')}}">Volver</a>
        <div class="container_signup">
            <div class="form_header">
                <div class="signup_title">
                    Registrar Producto
                </div>
                <br>
            </div>
            <div class="signup_section">
                <div class="form_content">
                    <form class="form_signup" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="title">
                            <input class="input_change" type="text" name="title" required value="">
                            <label>Titulo</label>

                        @error('title')
                            <span class="errores" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        </div>
                        <div class="price">
                            <input class="input_change" type="decimal" min="0" max="999999" name="price" required value="">
                            <label>Precio</label>
                            
                        @error('price')
                            <span class="errores" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                        </div>
                        <div class="select">
                            <select name="category_id" id="slct">
                                <option selected disabled>Seleccione una Categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        @error('category_id')
                            <span class="errores" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="description">
                            <textarea placeholder="Breve descripcion del producto" name="description" id="" cols="30" rows="10" value=""></textarea>

                        @error('category_id')
                            <span class="errores" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        </div>


                        <label class="file">
                            <input type="file" id="file" name="photos" aria-label="File browser example">
                            <span class="file-custom"></span>
                        </label>
                        @error('photos')
                            <span class="errores" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input class="submit_button" type="submit" name="" value="Subir Producto">
                        
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection