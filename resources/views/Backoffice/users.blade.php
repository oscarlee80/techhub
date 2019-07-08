@extends ('layouts.main')

@section ('title')
    TechHub | Administrar Usuarios
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
            <h1 align="center">Listado de Usuarios</h1>
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
                            <td>
                                @if ($user->role == 3)
                                Normal
                                @elseif ($user->role == 6)
                                Admin
                                @elseif ($user->role == 9)
                                Super Admin
                                @endif
                            </td>
                            <td>
                                <a href="/backoffice/users/{{ $user->id }}" type="submit" class="btn btn-success" value="" ><i class="far fa-eye"></i></a>
                            </td>
                            <td>
                                    <a href="/backoffice/users/{{ $user->id }}/edit" type="submit" class="btn btn-primary" value="" ><i class="far fa-edit"></i></a>
                            </td>
                            <td>
                                <form method="POST" action="/backoffice/users/{{$user->id}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" value="" ><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
    <hr>
    <div class="already_user" align="center">
            <a class="btn btn-dark" href="{{route ('backoffice') }}" role ="button" style="color:white"><i class="fas fa-arrow-left"></i></a>
        </div>
        <hr>
        {{ $users->links() }}
@endsection