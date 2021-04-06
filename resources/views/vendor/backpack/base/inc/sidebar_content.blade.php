<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->

<!-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="nav-icon fa fa-dashboard"></i> {{ trans('backpack::base.dashboard') }}</a></li> -->
<h4 class='nav-item nav-link text-white mt-3'>Adminstración de la plataforma</h4>

@if(Auth::user()->permission==2)

<li class='nav-item'><a class='nav-link' href="{{ backpack_url('user') }}"><i class="la la-user"></i> Usuarios</a></li>

<li class='nav-item'><a class='nav-link' href="{{ backpack_url('mezcla') }}"><i class="la la-clone"></i> Mezclas</a></li>

@endif

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="la la-file-image"></i> Subir fotos</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('fructification') }}'> Fructificación</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('flowering') }}'> Floración</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('tubers_at_harvest') }}'> Tubérculos a la cosecha</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('sprout') }}'> Brotamiento</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('farmer') }}'> Agricultores</a></li>
    </ul>
</li>

@if(Auth::user()->permission==2)

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="la la-map"></i> Localidades</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('region') }}'> Regiones</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('province') }}'> Provincias</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('district') }}'> Districtos</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('community') }}'> Comunidades</a></li>
    </ul>
</li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="la la-gear"></i> Sistema Kobo</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('xlsform') }}'> Xlsforms</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('datamap') }}'> Data Maps</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('variable') }}'> Variables</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('choice') }}'>Choices</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('submission') }}'> Submissions</a></li>
    </ul>
</li>

<h4 class='nav-item nav-link text-white mt-3'>Datos agronómicos</h4>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#">Datos del agricultor</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('farmer') }}'>Agricultores </a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('hhmember') }}'> Miembros de la familia</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('farmerorganisation') }}'> Organizaciones</a></li>
    </ul>
</li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#">Sistemas de produccion</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('productionsystem') }}'> Sistemas de produccion</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('plot') }}'> Parcelas</a></li>
    </ul>
</li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#">Mercados</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('farmerssale') }}'> Mercados</a></li>
    </ul>
</li>

<h4 class='nav-item nav-link text-white mt-3'>Variedades</h4>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('variety') }}'> Variedades</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('fructification') }}'> Fructificación</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('flowering') }}'> Floración</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('tubersatharvest') }}'>Tubérculos a la cosecha</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('sprout') }}'>Brotamiento</a></li>

@endif
