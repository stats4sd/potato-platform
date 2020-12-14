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
    Route::crud('xlsform', 'XlsformCrudController');
    Route::crud('submission', 'SubmissionCrudController');
    Route::crud('hhmember', 'HhMemberCrudController');
    Route::crud('productionsystem', 'ProductionSystemCrudController');
    Route::crud('farmerorganisation', 'FarmerOrganisationCrudController');
    Route::crud('flowering', 'FloweringCrudController');
    Route::crud('fructification', 'FructificationCrudController');
    Route::crud('tubersatharvest', 'TubersAtHarvestCrudController');
    Route::crud('sprout', 'SproutCrudController');
    Route::crud('farmerssale', 'FarmersSaleCrudController');
    Route::crud('plot', 'PlotCrudController');
}); // this should be the absolute last line of this file