<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AGUAPAN</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
    .text-block {
    position: absolute;
    top: 400px;
    color: white;
    padding-bottom: 50px;
    font-weight: 700;
    text-align: center;
    font-size: 55px;
    padding-left: 5%;
    padding-right: 5%;
    line-height: 1.2;
    width: 100%;
    }
    
    #image_home_page{
    width:100%;  
    object-fit:cover; 
    height:500px;
    }
    </style>
     @yield('styles')



    <!-- App scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
</head>
<body>
    <div id="app">
        <b-navbar toggleable="lg" type="dark" variant="info">
        <b-navbar-brand href="#">AGUAPAN</b-navbar-brand>
        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
        <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
                <b-nav-item href="/home">Inicio</b-nav-item>
                <b-nav-item href="/farmer">Guardianes</b-nav-item>
                <b-nav-item href="/catalogo">Catálogo de Variedades</b-nav-item>
                @if(Auth::check())
                    @if(Auth::user()->permission)
                    <b-nav-item href="/fotos">Subir Fotos</b-nav-item>
                    <b-nav-item href="/upload-images">Upload Photos</b-nav-item>
                    @endif
                    <b-nav-item active style=" position: absolute; right: 15px;"> Welcome {{ Auth::user()->name }} </b-nav-item>
                @endif
            </b-navbar-nav>
        </b-collapse>
        </b-navbar>
        <main>
            @yield('content')
        </main>
    </div>
</body>

@yield('javascript')

</html>
