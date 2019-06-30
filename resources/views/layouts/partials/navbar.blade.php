<div class="container-fluid">
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><img class="__imglogo" src="img/logo_techhub_5.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto o_navitems">
                <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) : ?>
                    <li class="nav-item o_navlinks">
                        <a class="nav-link o_links" href="manage_product.php">Administrar Productos</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION["email"])) { ?>
                    <li class="nav-item o_navlinks">
                        <a class="nav-link o_links" href="profile"><?php echo "<i class='far fa-user'></i>   " . $_SESSION["first_name"]; ?></a>
                    </li>
                    <li class="nav-item o_navlinks">
                        <a class="nav-link o_links" href="logout"><i class="fas fa-sign-out-alt"></i> Salir</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item o_navlinks">
                        <a class="nav-link o_links" href="{{ url('/login') }}"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
                    </li>
                    <li class="nav-item o_navlinks">
                        <a class="nav-link o_links" href="{{ url('/register') }}"><i class="fas fa-pen"></i> Registrarme</a>
                    </li>
                <?php } ?>
                <li class="nav-item o_navlinks">
                    <a class="nav-link o_links" href="{{ url('/faq') }}"><i class="far fa-question-circle"></i> FAQ</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 justify-content-end">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <br>
    <div id="carouselExampleFade" class="carousel slide carousel-fade d-none d-lg-flex" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/car01.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/car02.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/car03.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
</div>