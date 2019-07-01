@extends ('layouts.main')

@section ('title')
    Nueva Categoria
@endsection

@section ('content')
    <main>
        <a href="{{ route ('backoffice') }}">Volver</a>
        <div class="container_signup">
            <div class="form_header">
                <div class="signup_title">
                    Registrar Categoría
                </div>
                <br>
            </div>
            <div class="signup_section">
                <div class="form_content">
                    <form class="form_signup" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="name">
                            <input class="input_change" type="text" name="name" required value="">
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