@extends ('layouts/master')
@section ('content')
@section ('title')
Catalogo Completo
@endsection
@section ('content')
<br>
<div class="__ofertas row container-fluid">
    <div class="col-12 text-center __productos_destacados">
        <p>
            Catalogo Completo
        </p>
    </div>
    @if (isset($trending))
    @foreach ($trending as $value)
        <div class="card col-6 col-md-3 col-lg-2 __itemoferta" style="width: 18rem;">
            <img src="img/<?= $value['avatar'] ?>" class="card-img-top __imgofertas" alt="...">
            <div class="card-body">
                <p class="card-text o_tituloitems"><?= $value['title'] ?></p>
                <a href="#" class="d-flex btn btn-primary __comprar">$<?= $value['price'] ?></a>
            </div>
        </div>
    @endforeach
    @endif
</div>
@endsection
