<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="nav-icon fa fa-dashboard"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class='nav-item'><a class='nav-link' href="{{ backpack_url('upload') }}"><i class="nav-icon fa fa-cloud-upload"></i> Image Uploader</a></li>

<h4 class='nav-item nav-link text-white mt-3'>Agronomic Data</h4>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('xlsform') }}'><i class='nav-icon la la-question'></i> Xlsforms</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('submission') }}'><i class='nav-icon la la-question'></i> Submissions</a></li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Farmer Data</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('farmer') }}'><i class='nav-icon la la-question'></i> Farmers</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('hh_member') }}'><i class='nav-icon la la-question'></i> Hh_members</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('farmer_organisation') }}'><i class='nav-icon la la-question'></i> Farmer_organisations</a></li>
    </ul>
</li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Production Systems</a>
    <ul class="nav-dropdown-items">
<       li class='nav-item'><a class='nav-link' href='{{ backpack_url('production_system') }}'><i class='nav-icon la la-question'></i> Production_systems</a></li>
    </ul>
</li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Markets</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('market_info') }}'><i class='nav-icon la la-question'></i> Market_infos</a></li>
    </ul>
</li>

<h4 class='nav-item nav-link text-white mt-3'>Varieties</h4>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('variety') }}'><i class='nav-icon la la-question'></i> Varieties</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('fructificacion') }}'><i class='nav-icon la la-question'></i> Fructificacions</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('floracion') }}'><i class='nav-icon la la-question'></i> Floracions</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('cosehca') }}'><i class='nav-icon la la-question'></i> Cosehcas</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('brotamiento') }}'><i class='nav-icon la la-question'></i> Brotamientos</a></li>


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