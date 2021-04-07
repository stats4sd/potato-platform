<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogueController;

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

    Route::get('/catalogo', function () {
        return view('catalogo');
    });

    Route::get('/variedades', function () {
        return view('variedades');
    });

    Route::get('/fotos', function () {
        return redirect('/admin');
    });

    Route::get('/agronomic_data', function () {
        return view('agronomic_data');
    });

    Route::get('xlsforms/{xlsform}/downloadsubmissions', 'SubmissionController@download')->name('xlsforms.downloadsubmissions');

    Route::post('/variety-details', 'CatalogueController@getVarietyDetails');

    Route::post('/varieties-filter', 'CatalogueController@getVarietyFilter');
});


