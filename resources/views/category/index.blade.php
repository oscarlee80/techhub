@extends ('layouts/master')

@section ('title')
    TechHub | Categorias
@endsection

@section ('content')
<div class="container-fluid" id="category_index">
    <div class="col-12 text-center __productos_destacados">
        <p>
            Listado de Categorias
        </p>
    </div>
    @if (isset($categories))
    <div class="row __categories_wrapper">
        <ul>
            @foreach ($categories as $category)
                <a href="categories/{{$category->id}}">
                    <li>
                        {{$category->name}}
                    </li>
                </a>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection