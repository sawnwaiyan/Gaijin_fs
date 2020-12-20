<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', 'AuthController@login');
// Route::group(['middleware' => 'auth:api'],function () {
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
    
], function ($router) {
    Route::get('/me', 'AuthController@me');
    Route::post('/logout', 'AuthController@logout');
    Route::get('/product', 'ProductController@index');
});


Route::post('/product/create', 'ProductController@register');
Route::get('/product/edit/{id}', 'ProductController@edit');
Route::post('/product/update/{id}', 'ProductController@update');
Route::delete('/product/delete/{id}', 'ProductController@delete');
