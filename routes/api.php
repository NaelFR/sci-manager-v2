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


Route::post('register', 'API\Auth\RegisterController@register');
Route::post('login', 'API\Auth\LoginController@login');
Route::post('refresh', 'API\Auth\LoginController@refresh');
Route::middleware('auth:api')->group(function () {
    Route::get('user', 'API\UserController@index');
    Route::post('logout', 'API\Auth\LoginController@logout');

    // Buildings
    Route::apiResource('buildings', 'API\BuildingController');

    // Apartments
    Route::apiResource('buildings/{building}/apartments', 'API\ApartmentController', ['only' => ['index', 'store']]);
    Route::apiResource('apartments', 'API\ApartmentController', ['only' => ['show', 'update', 'destroy']]);

});
