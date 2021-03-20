<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Logbook;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json([
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

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
                return response()->json(User::find($user->Co_Usuario),202);
            } else {
                return response()->json(['Mensaje'=>'Nombre de usuario ya existe'],404);
            }
        } else {
            return response()->json(['Mensaje'=>'Email ya se uso'],404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->json([
            'users' => User::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        $user->Nb_Usuario = (isset($request->name)) ? $request->name : $user->Nb_Usuario;
        $user->Tx_Email = (isset($request->email)) ? $request->email : $user->Tx_Email;
        $user->Nu_Movil = (isset($request->phone)) ? $request->phone : $user->Nu_Movil;
        $user->Tx_Clave = (isset($request->password)) ? sha1($request->password) : $user->Tx_Clave;
        $user->Tx_Patron = (isset($request->pattern)) ? $request->pattern : '';
        $user->Nu_Intentos = (isset($request->attempts)) ? $request->attempts : $user->Nu_Intentos;
        $user->Fe_Recuperacion = (isset($request->date)) ? $request->date : $user->Fe_Recuperacion;
        $user->St_Bloqueo = (isset($request->block)) ? $request->block : $user->St_Bloqueo;
        $user->St_Activo = (isset($request->active)) ? $request->active : $user->St_Activo;

        if($user->save()) {
            $result = User::find($user->Co_Usuario);
        } else {
            $result = 'error';
        }

        return response()->json([
            'results' => $result
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::destroy($id);

        return response()->json([
            'results' => 'deteted'
        ]);
    }

    public function login(Request $request) {
        try{
            $password = sha1($request->password);

            $user = DB::table('t00100_usuario')->select('*')->where('Tx_Email', $request->email)->whereRaw('Tx_Clave = "'.$password.'"')->get();

            if(count($user) > 0) {
                if(!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['user'] = $user[0];

                $logbook = new Logbook;
                $previous_logbook = $logbook->getLastRecordByUser($user[0]->Co_Usuario);
                if($previous_logbook) {
                    $logbook->Co_Bitacora_Previo = $previous_logbook->Co_Bitacora;
                }

                $logbook->Co_Usuario = $user[0]->Co_Usuario;
                $logbook->Fe_Ins = date('Y-m-d H:i:s');
                $logbook->save();

                return response()->json([
                    'results' => 'logged'
                ]);
            }

            return response()->json([
                'results' => 'Email or password Incorrect'
            ]);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'results' => 'Email or password Incorrect'
            ]);
        }
    }


    public function logout(Request $request) {
        if(!isset($_SESSION)) {
            session_start();
        }
        session_destroy();

        return response()->json([
            'results' => 'Logout'
        ]);
    }

    public function isLogged(Request $request) {
        if(!isset($_SESSION)) {
            session_start();
        }
        return (isset($_SESSION['user'])) ? 1 : 0;
    }
}
