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


Route::get('/user', 'Auth\UserController@index');

Route::post('/category', 'ProductCategoryController@store');
Route::get('/category/{id}', 'ProductCategoryController@show');
Route::put('/category/{id}', 'ProductCategoryController@update');
Route::delete('/category/{id}', 'ProductCategoryController@destroy');

