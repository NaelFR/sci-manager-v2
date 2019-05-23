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
    Route::resource('buildings', 'API\BuildingController');

});
