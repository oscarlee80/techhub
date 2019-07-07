@extends ('layouts.main')

@section('content')
    <main>
        {{-- <a href="{{route ('productCrud')}}">Volver</a> --}}
        <div class="already_user offset-1 mt-1">
            <a href="{{url('backoffice/users')}}">Volver</a>
        </div>
        <div class="container_signup">
            <div class="form_header">
                <div class="signup_title">
                    Editar Usuario
                </div>
                <br>
            </div>
            <div class="signup_section">
                <div class="form_content">
                    <form class="form_signup" action="" method="post" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf
                        <div class="title">
                            <input class="input_change" type="text" name="first_name" required value="{{$user->first_name}}">
                            <label>Nombre</label>

                        @error('first_name')
                            <span class="errores" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        </div>
                        <div class="last_name">
                            <input class="input_change" type="text" name="last_name" required value="{{$user->last_name}}">
                            <label>Apellido</label>
                            
                        @error('last_name')
                            <span class="errores" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                        </div>
                        <div class="email">
                            <input class="input_change" type="email" name="email" required value="{{$user->email}}">
                            <label>Apellido</label>
                            
                        @error('email')
                            <span class="errores" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                        </div>
                        <div class="select">
                            <select name="role" id="slct">
                                <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                                @foreach ($roles as $role)
                                    @if($role != $user->role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label class="file">
                            <input type="file" id="file" name="avatar" aria-label="File browser example">
                            <span class="file-custom"></span>
                        </label>
                        {{-- @error('photos')
                            <span class="errores" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                        <input class="submit_button" type="submit" name="" value="Guardar Cambios">
                        
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection