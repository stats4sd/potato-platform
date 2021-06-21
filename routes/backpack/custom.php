<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

use App\Http\Controllers\Admin\VarietyCrudController;

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
    Route::crud('hhmember', 'HhMemberCrudController');
    Route::crud('productionsystem', 'ProductionSystemCrudController');
    Route::crud('farmerorganisation', 'FarmerOrganisationCrudController');
    Route::crud('flowering', 'FloweringCrudController');
    Route::crud('fructification', 'FructificationCrudController');
    Route::crud('tubers_at_harvest', 'TubersAtHarvestCrudController');
    Route::crud('sprout', 'SproutCrudController');
    Route::crud('farmerssale', 'FarmersSaleCrudController');
    Route::crud('plot', 'PlotCrudController');
    Route::crud('xlsform', 'XlsformCrudController');
    Route::crud('submission', 'SubmissionCrudController');
    Route::crud('variable', 'VariableCrudController');
    Route::crud('datamap', 'DataMapCrudController');
    //KoboToolBox API
    Route::post('xlsform/{xlsform}/deploytokobo', 'XlsformCrudController@deployToKobo');
    Route::post('xlsform/{xlsform}/syncdata', 'XlsformCrudController@syncData');
    Route::post('xlsform/{xlsform}/archive', 'XlsformCrudController@archiveOnKobo');
    Route::post('xlsform/{xlsform}/csvgenerate', 'XlsformCrudController@regenerateCsvFileAttachments');

    Route::crud('user', 'UserCrudController');
    Route::crud('choice', 'ChoiceCrudController');

    Route::get('variety/{id}/review', 'VarietyCrudController@review');
    Route::post('variety/variety-reviewed', 'VarietyCrudController@getVarietyReviewed');
 

    Route::crud('floweringreviewed', 'FloweringReviewedCrudController');
    Route::crud('fructificationreviewed', 'FructificationReviewedCrudController');
    Route::crud('tubersatharvestreviewed', 'TubersAtHarvestReviewedCrudController');
    Route::crud('sproutreviewed', 'SproutReviewedCrudController');

}); // this should be the absolute last line of this file