@extends ('layouts.main')

@section ('title')
    Registración
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
                    Regístrate
                </div>
                <div class="already_user">
                    ¿Ya tienes una cuenta techHub?
                    <a href="{{url('/login')}}">Iniciar Sesión</a>
                </div>
            </div>
            <div class="signup_section">
                <div class="form_content">
                    <form class="form_signup" id="register-form" action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="nombre-apellido">
                            <div class="name">
                                <input class="input_change @error('first_name') is-invalid @enderror" type="text" name="first_name" id="first_name" required value="{{ old('first_name') }}" autofocus >
                                <label>Nombre</label>

                                @error('first_name')
                                    <span class="errores" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="apellido">
                                <input class="input_change @error('last_name') is-invalid @enderror" type="text" name="last_name" id="last_name" required value="{{ old('last_name') }}">
                                <label>Apellido</label>
                                
                                @error('last_name')
                                    <span class="errores" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="email">
                            <input class="input_change @error('email') is-invalid @enderror" type="email" name="email" id="email" required value="{{ old('email') }}">
                            <label>Email</label>

                            @error('email')
                                <span class="errores" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="pass">
                            <input class="input_change @error('password') is-invalid @enderror" type="password" name="password" id="password"required value="">
                            <label>Contraseña</label>

                            @if(!$errors->has('password'))
                             <span class="__passHint" id="__passHint" >Debe contener al menos 8 caracteres, una mayuscula, minuscula y número.</span>
                            @endif

                            @error('password')
                                <span class="errores" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="pass_again">
                            <input class="input_change" type="password" name="password_confirmation" id="password_confirmation" required value="">
                            <label>Escribe tu contraseña de nuevo</label>

                        </div>
                        <input class="submit_button" type="submit" name="" id="submit-register" value="Regístrate">
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