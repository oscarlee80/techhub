@extends ('layouts.main')

@section('title')
    {{$user->fullName()}}
@endsection
@section('content')
    <div class="">
        <h2 class="mt-5 offset-1">
            Detalle de Usuario #{{$user->id}}
        </h2>
    </div>
    <div class="already_user offset-1 mt-1">
        <a href="{{url('backoffice/users')}}">Volver</a>
    </div>
    <div class="container-fluid">
        <div class="card mt-5" style="width: 18rem;">
            <img src="{{asset('storage/avatars/' . $user->avatar)}}" class="card-img-top" alt="No tiene foto">
            <div class="card-body">
                <h5 class="card-title">Nombre: {{$user->first_name}}</h5>
                <h5 class="card-title">Apellido: {{$user->last_name}}</h5>
                <h5 class="card-title">Email: {{$user->email}}</h5>
                <h5 class="card-title">Rol: {{$user->role}}</h5>
                <a href="{{url('backoffice/users/' . $user->id . '/edit')}}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </div>

@endsection