    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/login_register.css') }}" rel="stylesheet">

        <title>Document</title>
    </head>
    <body>

		@include('layouts.partials.navbar')

		<div class="spacer"></div>
		<div class="spacer"></div>
		
		@yield('content')

		<div class="spacer"></div>
		@include('layouts.partials.footer')

		@include('layouts.partials.scripts')

	</body>
    </html>
    