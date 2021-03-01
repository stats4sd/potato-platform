<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->

<!-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="nav-icon fa fa-dashboard"></i> {{ trans('backpack::base.dashboard') }}</a></li> -->
<h4 class='nav-item nav-link text-white mt-3'>Platform Management</h4>

@if(Auth::user()->permission==2)
<li class='nav-item'><a class='nav-link' href="{{ backpack_url('user') }}"><i class="nav-icon fa fa-users"></i> Users</a></li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Locations</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('region') }}'> Regions</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('province') }}'> Provinces</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('district') }}'> Districts</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('community') }}'> Communities</a></li>
    </ul>
</li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"> Kobo System</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('xlsform') }}'> Xlsforms</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('datamap') }}'> Data Maps</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('variable') }}'> Variables</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('choice') }}'>Choices</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('submission') }}'> Submissions</a></li>
    </ul>
</li>
@endif
<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="la la-file-image"></i>Image Uploader</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('fructification') }}'> Fructifications</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('flowering') }}'> Flowerings</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('tubers_at_harvest') }}'> Tubers At Harvests</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('sprout') }}'> Sprouts</a></li>
    </ul>
</li>

@if(Auth::user()->permission==2)
<h4 class='nav-item nav-link text-white mt-3'>Agronomic Data</h4>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Farmer Data</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('farmer') }}'> Farmers</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('hhmember') }}'> HH Members</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('farmerorganisation') }}'> Farmers Organisations</a></li>
    </ul>
</li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Production Systems</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('productionsystem') }}'> Production Systems</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('plot') }}'> Plots</a></li>
    </ul>
</li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Markets</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('farmerssale') }}'> Farmers Sales</a></li>
    </ul>
</li>

<h4 class='nav-item nav-link text-white mt-3'>Varieties</h4>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('variety') }}'> Varieties</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('fructification') }}'> Fructifications</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('flowering') }}'> Flowerings</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('tubersatharvest') }}'>Tubers At Harvests</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('sprout') }}'>Sprouts</a></li>

@endif
