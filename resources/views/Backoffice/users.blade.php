@extends ('layouts.main')

@section ('title')
    Administrar Usuarios
@endsection

@section ('content')
    <header class="container_header">
            <a href="/">
                <img class="img_logo" src="{{asset('/img/logo_techhub_5.png')}}" alt="logo">
            </a>
    </header>
    <br>
    <br>
    <br>
    <br>    
    <div class="container">
        <div class="">
            <h1>Listado de Usuarios</h1>
        </div>

        <div class="">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usuarios</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Mostrar</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->last_name . ', ' . $user->first_name }}</td>
                            <td>{{ $user->role}}</td>
                            <td>
                                <a href="{{url('backoffice/users/' . $user->id)}}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a href={{url('backoffice/users/' . $user->id . '/edit')}}>
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
    <div class="already_user">
        <a href="{{route('backoffice')}}">Volver</a>
    </div>
@endsection