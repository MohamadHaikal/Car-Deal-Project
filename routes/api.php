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



// VehicleController Api's
Route::resource('vehicles','VehiclesController');

// ClientController Api's
Route::resource('clients','ClientsController');

// BrandController Api's
Route::resource('brands','BrandsController');

// SpecialOfferController Api's
Route::resource('special_offers','SpecialOffersController');

