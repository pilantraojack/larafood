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
Route::get('/', function(){
    return response()->json(['message' => 'ok']);
});



Route::post('/sanctum/token', 'Api\Auth\AuthClientController@auth');

Route::group([
    'middleware' => ['auth:sanctum']
], function() {
    Route::get('/auth/me', 'Api\Auth\AuthClientController@me');
    Route::post('/auth/logout', 'Api\Auth\AuthClientController@logout');

    Route::post('/auth/v1/orders/{identifyOrder}/evaluations', 'Api\EvaluationApiController@store');

    Route::get('/auth/v1/my-orders', 'Api\OrderApiController@myOrders');
    Route::post('/auth/v1/orders', 'Api\OrderApiController@store');

});


// Api v1 group
Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function () {
    // Tenants
    Route::get('/tenants/{uuid}', 'TenantApiController@show');
    Route::get('/tenants', 'TenantApiController@index');

    // Categories
    Route::get('/categories/{identify}', 'CategoryApiController@show');
    Route::get('/categories', 'CategoryApiController@categoriesByTenant');

    // Tables
    Route::get('/tables/{identify}', 'TableApiController@show');
    Route::get('/tables', 'TableApiController@tablesByTenant');

    // Products
    Route::get('/products/{identify}', 'ProductApiController@show');
    Route::get('/products', 'ProductApiController@productsByTenant');

    Route::post('/client', 'Auth\RegisterController@store');

    Route::get('/orders/{identify}', 'OrderApiController@show');

});




