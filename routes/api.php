<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::post('/sanctum/token', 'Api\Auth\AuthClientController@auth');


// Api v1 group
Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function () {
    Route::get('/tenants/{uuid}', 'TenantApiController@show');
    Route::get('/tenants', 'TenantApiController@index');

    Route::get('/categories/{url}', 'CategoryApiController@show');
    Route::get('/categories', 'CategoryApiController@categoriesByTenant');

    Route::get('/tables/{identify}', 'TableApiController@show');
    Route::get('/tables', 'TableApiController@tablesByTenant');

    Route::get('/products/{flag}', 'ProductApiController@show');
    Route::get('/products', 'ProductApiController@productsByTenant');

    Route::post('/client', 'Auth\RegisterController@store');

    Route::post('/sanctum/token', 'Auth\AuthClientController@auth');

});




