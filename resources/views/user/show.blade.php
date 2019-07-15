@extends ('layouts.main')

@section ('title')
{{$user->fullName()}}
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
    <div align="center" class="card" style="width: 18rem;">
        <img class="card-img-top" src="/storage/avatars/{{ $user->avatar }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">ID #{{ $user->id }}</h5>
            <h5> {{ $user->fullname()}} </h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Nombre : {{ $user->first_name }}</li>
            <li class="list-group-item">Apellido : {{ $user->last_name }}</li>
            <li class="list-group-item">Email : {{ $user->email }}</li>
            <li class="list-group-item">Rol : 
                @if ($user->role == 3)
                Normal
                @elseif ($user->role == 6)
                Admin
                @elseif ($user->role == 9)
                Super Admin
                @endif
            </li>
        </ul>
        <div class="card-body">
            <a class="btn btn-dark" href="/backoffice/users" role ="button" style="color:white"><i class="fas fa-arrow-left"></i></a>
            <a href="/backoffice/users/{{ $user->id }}/edit" type="" class="btn btn-primary" value="" ><i class="far fa-edit"></i></a>
            <form method="POST" action="/backoffice/users/{{$user->id}}">
                @method('DELETE')
                @csrf
                <button style="margin-top: 5px" type="submit" class="btn btn-danger" value="" ><i class="far fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
</div>

@endsection