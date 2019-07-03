@extends('layouts.master')

@section('content')
{{-- @dd($user) --}}
<body class="__perfil" id="body">
    <div class="_main_container">
        <div class="_profile_info">
          <div class="_photo" style="background-image: url('storage/avatars/' . {{$user->avatar}})">
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
                                    <input class="input_change" type="text" name="first_name" required value="" autofocus>
                                    <div class="_errors">
                                        <?php if (isset($errors["first_name"])) : ?>
                                            <?= $errors["first_name"]; ?>
                                            <br>
                                        <?php endif; ?>
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
                                    <input class="input_change" type="text" name="last_name" required value="" autofocus>
                                    <div class="_errors">
                                        <?php if (isset($errors["last_name"])) : ?>
                                            <?= $errors["last_name"]; ?>
                                            <br>
                                        <?php endif; ?>
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
                                    <input name="hidden" type="hidden" id="hidden" value="" placeholder="">
                                    <input id="_inputProfile" type="file" name="avatar" value="" />
                                    <div class="_errors">
                                        <?php if (isset($errors["avatar"])) : ?>
                                            <?= $errors["avatar"]; ?>
                                            <br>
                                        <?php endif; ?>
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