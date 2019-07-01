@extends ('layouts.main')

@section ('title')
    Administrar Categorías
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
            <h1>Listado de Categorías</h1>
        </div>

        <div class="">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Mostrar</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $value)
                        <tr>

                            <th scope="row"><?= $value["id"] ?></th>
                            <td><?= $value["name"]; ?></td>
                            <td><a href="showProduct.php?id=<?= $value['id']; ?>">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                            <td><a href="editProduct.php?id=<?= $value['id']; ?>">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td><a href="">
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
        <br>
        <a href="{{ route ('addCategory') }}">Nueva Categoría</a>
    </div>
@endsection