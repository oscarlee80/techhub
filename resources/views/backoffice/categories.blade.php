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
            <h1 align="center">Listado de Categorías</h1>
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
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name}}</td>
                        <td><a href="/backoffice/category/{{ $category->id }}" type="" class="btn btn-outline-success" value="" ><i class="far fa-eye"></i></a>
                        </td>
                        <td>
                            <a href="/categories/{{ $category->id }}/edit" type="" class="btn btn-outline-primary" value="" ><i class="far fa-edit"></i></a>
                        </td>
                        <td>
                            <form id="destroyForm" method="POST" action="/categories/{{$category->id}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger" value="" ><i class="far fa-trash-alt"></i></button>
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
        <a class="btn btn-success" href="{{route ('addCategory') }}" role ="button" style="color:white"><i class="fas fa-plus-square"></i></a>
        <a class="btn btn-primary" href="{{route ('exportCategories') }}" role ="button" style="color:white"><i class="fas fa-file-download"></i></a>
    </div>
    <hr>
    {{ $categories->links() }}
@endsection