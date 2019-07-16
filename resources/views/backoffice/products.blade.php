@extends ('layouts.main')

@section ('title')
    Administrar Productos
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
            <h1 align="center">Listado de Productos</h1>
        </div>

        <div class="">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Productos</th>
                        <th scope="col">Mostrar</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->title}}</td>
                            <td><a href="/backoffice/product/{{ $product->id}}" type="" class="btn btn-outline-success" value="" ><i class="far fa-eye"></i></button>
                            </td>
                            <td>
                                <a href="/products/{{ $product->id }}/edit" type="" class="btn btn-outline-primary" value="" ><i class="far fa-edit"></i></a>
                            </td>
                            <td>
                                <form id="destroyForm" method="POST" action="/products/{{$product->id}}">
                                    @method('DELETE')
                                    @csrf
                                    <button id="destroyConfirm" type="submit" class="btn btn-outline-danger" value="" >
                                        <i class="far fa-trash-alt"></i>
                                    </button>
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
            <a class="btn btn-success" href="{{route ('addProduct') }}" role ="button" style="color:white"><i class="fas fa-plus-square"></i></a>
            <a class="btn btn-primary" href="{{route ('exportProducts') }}" role ="button" style="color:white"><i class="fas fa-file-download"></i></a>
            
        </div>
        <hr>
        {{ $products->links() }}
@endsection
