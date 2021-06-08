<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('regions', "App\Http\Controllers\Api\RegionController");
Route::apiResource('farmers', "Api\FarmerController");
Route::apiResource('varieties', "Api\VarietyController");
Route::apiResource('parameter-filters', "Api\ParameterFilterController");
Route::apiResource('campanas', "Api\ChoiceController");
Route::apiResource('varieties-list', "Api\VarietyListController");
