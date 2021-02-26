<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Yanapai</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <!-- App scripts -->
</head>
<body>
    <div id="app">
        <b-navbar toggleable="lg" type="dark" variant="info">
        <b-navbar-brand href="#">AGUAPAN</b-navbar-brand>
        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
        <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
                <b-nav-item href="/home">Inicio</b-nav-item>
                <b-nav-item href="/catalogo">Catálogo de Variedades</b-nav-item>
                <b-nav-item href="/fotos">Subir Fotos</b-nav-item>
            </b-navbar-nav>
        </b-collapse>
        </b-navbar>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

@yield('javascript')
</html>
