<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

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
        $user = new User;

        $user->Nb_Usuario = $request->name;
        $user->Tx_Email = $request->email;
        $user->Nu_Movil = $request->phone;
        $user->Tx_Clave = bcrypt($request->password);
        $user->Tx_Patron = (isset($request->pattern)) ? $request->pattern : '';
        $user->Nu_Intentos = (isset($request->attempts)) ? $request->attempts : 1;
        $user->Fe_Recuperacion = date('Y-m-d H:i:s');
        $user->St_Bloqueo = (isset($request->block)) ? $request->block : 0;
        $user->St_Activo = (isset($request->active)) ? $request->active : 1;

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
        $user->Tx_Clave = (isset($request->password)) ? bcrypt($request->password) : $user->Tx_Clave;
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
}
