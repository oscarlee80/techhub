@extends ('layouts.main')

@section ('title')
    Modificar {{ $category->name }}
@endsection

@section ('content')
    <main>
        <a href="{{ route ('categoriesCrud') }}">Volver</a>
        <div class="container_signup">
            <div class="form_header">
                <div class="signup_title">
                    Modificar Categoría
                </div>
                <br>
            </div>
            <div class="signup_section">
                <div class="form_content">
                    <form class="form_signup" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        @method ('PATCH')
                        <div class="name">
                            <input class="input_change" type="text" name="name" required value="{{ $category->name }}">
                            <label>Nombre</label>
                        @error('name')
                            <span class="errores" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <input class="submit_button" type="submit" name="" value="Crear Categoría">
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection 