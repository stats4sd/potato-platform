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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                @if(Auth::check())
                    @if(Auth::user()->permission)
                    <b-nav-item href="/fotos">Subir Fotos</b-nav-item>
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

<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>

<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/fc-3.2.5/fh-3.1.4/r-2.2.2/sc-2.0.0/sl-1.3.0/datatables.min.css"/>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/fc-3.2.5/fh-3.1.4/r-2.2.2/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>


@yield('javascript')
</html>
