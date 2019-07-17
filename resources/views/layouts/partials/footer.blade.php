<div class="d-flex">
    <footer class="piedepag row">
        <article class="sucursales col-12 col-md-4 __artpie">
            <h4>Sucursales</h4>
            <p>Centro</p>
            <p>Av. de Mayo 1234</p>
            <br>
            <p>Palermo</p>
            <p>Serrano 1234</p>

        </article>
        <article class="sucursales col-12 col-md-4 __artpie">
            <h4>Contacto</h4>
            <p>E-Mail</p>
            <a href="mailto:support@techhub.com"><i class="far fa-envelope"></i> support@techhub.com</a>
            <br>
            <br>
            <p>Teléfono</p>
            <a href="tel:08109997000"><i class="fas fa-phone"></i> 0810-999-7000</a>
        </article>
        <article class="sucursales col-12 col-md-4 __artpie">
            <h4>Mi cuenta</h4>
            @if (isset(Auth::user()->first_name))
            <a href="{{url('profile/'. auth()->user()->id)}}"><i class="fas fa-sign-in-alt"></i>{{' ' .  Auth::user()->first_name }}</a>
            <br>
            @else
            <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
            <br>
            <a href="{{ route('register') }}"><i class="fas fa-pen"></i> Registracion</a>
            <br>
            @endif
            <a href="{{ url('/faq') }}"><i class="far fa-question-circle"></i> FAQ</a>
            <br>
            <a href="{{url('/cart')}}"><i class="fas fa-shopping-cart"></i> Mi Carrito</a>

        </article>
    </footer>
</div>