<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('region', 'RegionCrudController');
    Route::crud('district', 'DistrictCrudController');
    Route::crud('province', 'ProvinceCrudController');
    Route::crud('farmer', 'FarmerCrudController');
    Route::crud('community', 'CommunityCrudController');
    Route::crud('variety', 'VarietyCrudController');
    Route::crud('farmer_organisation', 'Farmer_organisationCrudController');
    Route::crud('xlsform', 'XlsformCrudController');
    Route::crud('submission', 'SubmissionCrudController');
    Route::crud('production_system', 'Production_systemCrudController');
    Route::crud('market_info', 'Market_infoCrudController');
    Route::crud('hh_member', 'Hh_memberCrudController');
    Route::crud('fructificacion', 'FructificacionCrudController');
    Route::crud('floracion', 'FloracionCrudController');
    Route::crud('cosehca', 'CosehcaCrudController');
    Route::crud('brotamiento', 'BrotamientoCrudController');
}); // this should be the absolute last line of this file