<?php

use App\Models\User;
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

Route::get('/product/{id}', function ($id) {
    return view('product', [ 'id' => $id ]);
});

Route::get('/categories', function () {
    return view('listCategories');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', function (\Illuminate\Http\Request $request) {
        return view('/login');
    });

    Route::post('/login', 'Auth\UserController@login');

    Route::get('/register', function (\Illuminate\Http\Request $request) {
        return view('register');
    });

    Route::post('/register', function (\Illuminate\Http\Request $request) {
        $email = User::where('Tx_Email', '=', $request->email)->first();
        $name = User::where('Nb_Usuario', '=', $request->name)->first();

        if(is_null($email)) {
            if(is_null($name)) {
                $user = new User;
                $user->Nb_Usuario = $request->name;
                $user->Tx_Email = $request->email;
                $user->Nu_Movil = $request->phone;
                $user->Tx_Clave = sha1($request->password);
                $user->Tx_Patron = (isset($request->pattern)) ? $request->pattern : '';
                $user->Nu_Intentos = (isset($request->attempts)) ? $request->attempts : 1;
                $user->Fe_Recuperacion = date('Y-m-d H:i:s');
                $user->St_Bloqueo = (isset($request->block)) ? $request->block : 0;
                $user->St_Activo = (isset($request->active)) ? $request->active : 1;
                $user->save();
                return view('login');
            } else {
                $message = 'Algo salio mal';
                return view('login', compact('message'));
            }
        } else {
            $message = 'Algo salio mal';
            return view('login', compact('message'));
        }
    });

});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/add-category', function () {
        return view('addCategory');
    });

    Route::get('/add-product', function () {
        return view('addProduct');
    });

    Route::get('/logout', function (\Illuminate\Http\Request $request) {
        $request->session()->forget('user');
        if(!isset($_SESSION)) {
            session_start();
        }
        session_destroy();

        return redirect('login');
    });

    Route::get('/account', function (\Illuminate\Http\Request $request) {

        if(!isset($_SESSION)) {
            session_start();
        }
        if(isset($_SESSION['user'])) {
            $current_user = \App\Models\User::find($_SESSION['user']->Co_Usuario);
            $request->session()->put('user', $current_user);
            $_SESSION['user'] = $current_user; //for logbook
        }
        return view('account');
    });

    Route::get('/audit', function () {
        $list = DB::table('t99999_auditoria')->paginate(15);
        return view('audit', compact('list'));
    });

    Route::get('/audit/{id}', function ($id) {
        $audit = \App\Models\Audit::find($id);
        return view('singleAudit', compact('audit'));
    });

    Route::get('/logbook', function () {
        $list = DB::table('t99999_bitacora')->paginate(15);
        return view('logbook', compact('list'));
    });

});
