<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/list', function () {
    return view('list');
});

Route::get('/category/{id}', function ($id) {
    return view('categoryDetails', [ 'id' => $id ]);
});

Route::get('/add-category', function () {
    return view('addCategory');
});

Route::get('/categories', function () {
    return view('listCategories');
});

// Route::get('/', function () {
//     return view('listar');
// });

// Route::get('/', function () {
//     return view('delete');
// });

// Route::get('/', function () {
//     return view('update');
// });
