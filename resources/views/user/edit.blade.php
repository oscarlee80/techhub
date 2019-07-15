@extends ('layouts.main')

@section ('title')
{{ $user->first_name }} . {{$user->last_name}}
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
    <a href="/backoffice/users" class="btn btn-dark btn-lg" role ="button" ><i class="fas fa-arrow-left"></i> Volver</a>
    <hr width="380px">
    <h2 >M O D I F I C A R</h2>
    <h2 >U S U A R I O</h2>
    <hr width="380px">
    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        @method ('PATCH')
        <div class="form-group">
            <label for="first_name">Nombre</label>

            @error('first_name')
                <br>
                <span class="errores" role="alert" style="color:red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input name="first_name" value="{{ $user->first_name }}" type="text" class="form-control"  style="width : 330px;">
        </div>
        <div class="form-group">
            <label for="last_name">Apellido</label>

            @error('last_name')
                <br>
                <span class="errores" role="alert" style="color:red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input name="last_name" value="{{ $user->last_name }}" type="text" class="form-control"  style="width : 330px;">
        </div>
        <div class="form-group">
                <label for="email">E-Mail</label>
    
                @error('email')
                    <br>
                    <span class="errores" role="alert" style="color:red">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    
                <input name="email" value="{{ $user->email }}" type="text" class="form-control"  style="width : 330px;">
            </div>
        <div class="form-group">
            <label for="role">Rol</label>

            @error('role')
                <br>
                <span class="errores" role="alert" style="color:red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <select name="role" class="form-control" style="width : 330px;">
                <option value="{{$user->role}}" selected value>
                    @if ($user->role == 3)
                    Normal
                    @elseif ($user->role == 6)
                    Admin
                    @elseif ($user->role == 9)
                    Super Admin
                    @endif
                </option>
                @foreach ($roles as $numero => $nombre)
                    @if ($user->role !== $numero)
                    <option value="{{ $numero }}">{{ $nombre }}</option>
                    @endif
                @endforeach
            </select>
            <br>
            <label for="">Avatar</label>
            <br>
            <label class="file">
                    <input type="file" id="file" name="avatar" aria-label="File browser example">
                    <span class="file-custom" id="fileUpload_name"></span>
                </label>
        
                @error('avatar')
                <br>
                <span class="errores" role="alert" style="color:red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        <br>
        <hr align="center" width="380px">
        <div class="md-form mt-0">
            <button type="submit" class="btn btn-success btn-lg" >Modificar usuario</button>
        </div>
    </form>
</div>

@endsection

