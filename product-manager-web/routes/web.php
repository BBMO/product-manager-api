<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/add-product', function () {
    return view('addProduct');
});

Route::get('/product/{id}', function ($id) {
    return view('product', [ 'id' => $id ]);
});

Route::get('/categories', function () {
    return view('listCategories');
});

Route::get('/audit', function () {
    $list = DB::table('t99999_auditoria')->paginate(15);
    return view('audit', compact('list'));
});

Route::get('/audit/{id}', function ($id) {
    $audit = \App\Models\Audit::find($id);
    return view('singleAudit', compact('audit'));
});
