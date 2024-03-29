<div class="container-fluid">
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="/">
            <img class="__imglogo" src={{asset("img/logo_techhub_6.png")}} alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto o_navitems">

                <li class="nav-item o_navlinks">
                    <a class="nav-link o_links" href="{{ url('/categories') }}">
                        Categorias
                    </a>
                </li>

                {{-- <li class="nav-item o_links dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categorias</a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </li> --}}

                @if (isset(Auth::user()->first_name))
                    <li class="nav-item o_navlinks">
                        <a class="nav-link o_links" href="{{url('profile/'. auth()->user()->id)}}"><i class='far fa-user'></i>{{' ' .  Auth::user()->first_name }}</a>
                    </li>
                    <li class="nav-item o_navlinks">
                        <a class="nav-link o_links" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Salir</a>
                        </a> 
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                        </form>
                    </li>
                @if (auth()->user()->role == 6 || auth()->user()->role == 9)
                    <li class="nav-item o_navlinks">
                        
                        <a class="nav-link o_links" href="{{ route ('backoffice') }}">
                            <i class="fas fa-database"></i>
                            BackOffice
                        </a>
                    </li>
                @endif
                @else
                    <li class="nav-item o_navlinks">
                        <a class="nav-link o_links" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
                    </li>
                    <li class="nav-item o_navlinks">
                        <a class="nav-link o_links" href="{{ route('register') }}"><i class="fas fa-pen"></i> Registrarme</a>
                    </li>
                @endif
                <li class="nav-item o_navlinks">
                    <a class="nav-link o_links" href={{url('/cart')}}>
                        <i class="fas fa-shopping-cart"></i>
                        ({{ isset(session('cart')['products']) ? count(session('cart')['products']) : 0 }})
                    </a>
                </li>
                <li class="nav-item o_navlinks">
                    <a class="nav-link o_links" href="{{ url('/faq') }}"><i class="far fa-question-circle"></i> FAQ</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 justify-content-end _search_box" action="/results">
                <input name="keywords" class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>
</header>
</div>