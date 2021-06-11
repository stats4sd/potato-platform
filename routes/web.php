<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\Api\FarmerController;
use App\Http\Controllers\Admin\VarietyCrudController;
use App\Models\Flowering;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//To accept temporary uploads.
Route::mediaLibrary();

Auth::routes();
Route::middleware(['auth'])->group(function() {

    Route::get('/', function () {
        return view('home');
    });

    Route::get('admin/logout', function () {
        return redirect('/home');
    });


    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/farmer', function () {
        return view('farmer');
    });

    Route::get('/catalogo', function () {
        return view('catalogo');
    });

    Route::get('/variedades', function () {
        return view('variedades');
    });

    Route::get('/fotos', function () {
        return redirect('/admin/fructification');
    });

    Route::get('/agronomic_data', function () {
        return view('agronomic_data');
    });

    Route::get('/farmer', function () {
        return view('farmer');
    });

    Route::get('/upload-images', function () {
            return view('upload_image');
    });

    Route::get('xlsforms/{xlsform}/downloadsubmissions', 'SubmissionController@download')->name('xlsforms.downloadsubmissions');

    Route::post('/variety-details', 'CatalogueController@getVarietyDetails');
    Route::post('/variety-images', 'MediaController@getVarietyImages');

    Route::post('/store-images', 'MediaController@store');
  

    
    
});


