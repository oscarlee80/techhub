@extends ('layouts.main')

@section ('title')
    Iniciar Sesión
@endsection

@section ('content')
    <header class="container_header">
            <a href="/">
                <img class="img_logo" src="{{asset('/img/logo_techhub_5.png')}}" alt="logo">
            </a>
    </header>
    <main>
        <div class="container_signup">
            <div class="form_header">
                <div class="signup_title">
                    Iniciar Sesión
                </div>
                <div class="already_user">
                    ¿Nuevo en techHub?
                    <a href="{{url('/register')}}" >Regístrate</a>
                </div>
            </div>
            <div class="signup_section">
                {{-- <div class="form_content">
                    <form class="form_signup" action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="email">
                            <input class="input_change @error('email') is-invalid @enderror" type="email" name="email" required value="{{ old('email') }}" autocomplete="email">
                            <label>Email</label>

                            @error('email')
                                <span class="errores" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="pass">
                            <input class="input_change @error('password') is-invalid @enderror" type="password" name="password" required value="">
                            <label>Contraseña</label>

                            @error('password')
                                <span class="errores" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="remmember form-check">
                            <input class="remmember_checkbox form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <input class="submit_button" type="submit" name="" value="Ingresar">
                    </form>
                </div> --}}
                <div class="form_content">
                    <form class="form_signup" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="email">
                            <input class="input_change @error('email') is-invalid @enderror" type="email" name="email" required value="{{ old('email') }}" autofocus>
                            <label>Email</label>
                            @error('email')
                                <span class="errores" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="pass">
                            <input class="input_change @error('password') is-invalid @enderror" type="password" name="password" required value="">
                            <label>Contraseña</label>
                            @error('password')
                                <span class="errores" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="remmember">
                            <input class="remmember_checkbox" type="checkbox" name="remember" value="Recuerdame">Recuérdame
                            <a href="#">¿Olvido su Contraseña?</a>
                        </div>
                        <input class="submit_button" type="submit" name="" value="Iniciar Sesión">
                    </form>
                </div>
                <div class="divider">
                    <!-- linea vertical -->
                </div>
                <div class="o-xs-register d-lg-none">
                    <div class="separador_horizontal"></div>
                    <div class="texto-separador">O utiliza</div>
                    <div class="separador_horizontal"></div>
                </div>
                <div class="signup_social">
                    <a class="href_facebook" href="{{ url('auth/facebook')}}">
                        <div class="facebook">
                            <div class="facebook_icon">
                                <i class="fab fa-facebook-f"></i>
                            </div>
                            Continuar con Facebook
                        </div>
                    </a>
                    <a class="href_google" href="{{ url('auth/google')}}">
                        <div class="google">
                            <div class="google_icon">
                                <i class="fab fa-google"></i>
                            </div>
                            Continuar con Google
                        </div>
                    </a>
                </div>
            </div>
        </div>
</main>
@endsection

