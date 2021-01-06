<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="nav-icon fa fa-dashboard"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="la la-file-image"></i>Image Uploader</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('fructification') }}'><i class=''></i> Fructifications</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('flowering') }}'><i class=''></i> Flowerings</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('tubers_at_harvest') }}'><i class=''></i> Tubers A tHarvests</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('sprout') }}'><i class=''></i> Sprouts</a></li>
    </ul>
</li>

<h4 class='nav-item nav-link text-white mt-3'>Agronomic Data</h4>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('xlsform') }}'><i class='nav-icon la la-question'></i> Xlsforms</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('submission') }}'><i class='nav-icon la la-question'></i> Submissions</a></li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Farmer Data</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('farmer') }}'><i class='nav-icon la la-question'></i> Farmers</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('hhmember') }}'><i class='nav-icon la la-question'></i> HhMembers</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('farmerorganisation') }}'><i class='nav-icon la la-question'></i> FarmerOrganisations</a></li>
    </ul>
</li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Production Systems</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('productionsystem') }}'><i class='nav-icon la la-question'></i> ProductionSystems</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('plot') }}'><i class='nav-icon la la-question'></i> Plots</a></li>
    </ul>
</li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Markets</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('farmerssale') }}'><i class='nav-icon la la-question'></i> FarmersSales</a></li>
    </ul>
</li>

<h4 class='nav-item nav-link text-white mt-3'>Varieties</h4>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('variety') }}'><i class='nav-icon la la-question'></i> Varieties</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('fructification') }}'><i class='nav-icon la la-question'></i> Fructifications</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('flowering') }}'><i class='nav-icon la la-question'></i> Flowerings</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('tubersatharvest') }}'><i class='nav-icon la la-question'></i> TubersAtHarvests</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('sprout') }}'><i class='nav-icon la la-question'></i> Sprouts</a></li>


<h4 class='nav-item nav-link text-white mt-3'>Platform Management</h4>

<li class='nav-item'><a class='nav-link' href="{{ backpack_url('user') }}"><i class="nav-icon fa fa-users"></i> Users</a></li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Locations</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('region') }}'><i class='nav-icon la la-question'></i> Regions</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('province') }}'><i class='nav-icon la la-question'></i> Provinces</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('district') }}'><i class='nav-icon la la-question'></i> Districts</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('community') }}'><i class='nav-icon la la-question'></i> Communities</a></li>
    </ul>
</li>


