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


Route::get('/users', 'Auth\UserController@index');
Route::post('/users', 'Auth\UserController@store');
Route::get('/users/{id}', 'Auth\UserController@show');
Route::put('/users/{id}', 'Auth\UserController@update');
Route::delete('/users/{id}', 'Auth\UserController@destroy');
Route::post('/login', 'Auth\UserController@login');
Route::get('/logout', 'Auth\UserController@logout');
Route::get('/isLogged', 'Auth\UserController@isLogged');

Route::get('/category', 'ProductCategoryController@index');
Route::post('/category', 'ProductCategoryController@store');
Route::get('/category/{id}', 'ProductCategoryController@show');
Route::put('/category/{id}', 'ProductCategoryController@update');
Route::delete('/category/{id}', 'ProductCategoryController@destroy');

Route::get('/product', 'ProductController@index');
Route::post('/product', 'ProductController@store');
Route::get('/product/{id}', 'ProductController@show');
Route::put('/product/{id}', 'ProductController@update');
Route::delete('/product/{id}', 'ProductController@destroy');

