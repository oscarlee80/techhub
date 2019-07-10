@extends('layouts.onlyNav')

@section('content')
{{-- @dd(auth()->user()->first_name) --}}
{{-- @dd($user) --}}
<body class="__perfil" id="body">
    <div class="_main_container">
        <div class="_profile_info">
          <div class="_photo" style="background-image: url({{asset('storage/avatars/' . $user->avatar)}})">
                <!-- <img class="" src="" alt=""> -->
            </div>
            <div class="_info">
                <div class="_user_info">
                    <p class="_title">
                        DATOS PERSONALES
                    </p>
                    <p>
                        Nombre: {{$user->first_name}}
                        <a href="#popupFirstName"><i class="far fa-edit"></i></a>
                    </p>
                    <div id="popupFirstName" class="overlay">
                        <div id="popupBody">
                            <h2>Editar Nombre</h2>
                            <a id="cerrar" href="">&times;</a>
                            <div class="popupContent">
                                <form class="__profile_form" action="" method="POST">
                                    {{ method_field('PATCH') }}
                                    @csrf
                                    <input class="input_change" type="text" name="first_name" required value="" autofocus>
                                    <div class="_errors">
                                        @error('first_name')
                                        <span class="errores" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <br>
                                    <input class="submit_button" type="submit" name="" value="Cambiar">
                                </form>
                            </div>
                        </div>
                    </div>
                    <p>
                        Apellido: {{$user->last_name}}
                        <a href="#popupLastName"><i class="far fa-edit"></i></a>
                    </p>
                    <div id="popupLastName" class="overlay">
                        <div id="popupBody">
                            <h2>Editar Apellido</h2>
                            <a id="cerrar" href="">&times;</a>
                            <div class="popupContent">
                                <form class="__profile_form" action="" method="POST">
                                    {{ method_field('PATCH') }}
                                    @csrf
                                    <input class="input_change" type="text" name="last_name" required value="" autofocus>
                                    <div class="_errors">
                                        @error('last_name')
                                        <span class="errores" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <br>
                                    <input class="submit_button" type="submit" name="" value="Cambiar">
                                </form>
                            </div>
                        </div>
                    </div>
                    <p>
                        Email: {{$user->email}}
                        <a href="#popupEmail"><i class="far fa-edit"></i></a>
                    </p>
                    <div id="popupEmail" class="overlay">
                        <div id="popupBody">
                            <h2>Editar Email</h2>
                            <a id="cerrar" href="">&times;</a>
                            <div class="popupContent">
                                <form class="__profile_form" action="" method="POST">
                                    {{ method_field('PATCH') }}
                                    @csrf
                                    <input class="input_change" type="text" name="" required value="WOHOHO Despacio Cerebrito!">
                                    <br>
                                    <input class="submit_button" type="submit" name="" value="Cambiar">
                                </form>
                            </div>
                        </div>
                    </div>
                    <p>
                        <a class="_change_photo" href="#popupAvatar">Cambiar Foto</a>
                    </p>
                    <div id="popupAvatar" class="overlay">
                        <div id="popupBody">
                            <h2>Selecione Foto</h2>
                            <a id="cerrar" href="">&times;</a>
                            <div class="popupContent">
                                <form class="__profile_form" action="" method="POST" enctype="multipart/form-data">
                                    {{ method_field('PATCH') }}
                                    @csrf
                                    <input name="hidden" type="hidden" id="hidden" value="" placeholder="">
                                    <input id="_inputProfile" type="file" name="avatar" value="" />
                                    <div class="_errors">
                                        
                                    </div>
                                    <br>
                                    <br>
                                    <input class="submit_button" type="submit" name="" value="Cambiar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="_info2"></div>
            </div>
        </div>
    </div>
    <footer class="_footer">
        <!-- Por ahora solo lleva el fondo -->
    </footer>
</body>



@endsection