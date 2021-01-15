<?php

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


Route::get('/', function () {
    return view('home');
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
    return view('fotos');
});

Route::post('/variety-details', 'App\Http\Controllers\CatalogueController@getVarietyDetails');