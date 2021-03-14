<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
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
            'results' => Product::all()
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
        $product = new Product;

        $product->Nb_Producto = $request->name;
        $product->Co_Poducto_Categoria = $request->category;
        $product->St_Activo = $request->active;

        if($product->save()) {
            $result = Product::find($product->Co_Producto);
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
            'results' => Product::find($id)
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
        $product = Product::find($id);
        $product->Nb_Producto = (isset($request->name)) ? $request->name : $product->Nb_Producto;
        $product->Co_Poducto_Categoria = (isset($request->category)) ? $request->category : $product->Co_Poducto_Categoria;
        $product->St_Activo = (isset($request->active)) ? $request->active : $product->St_Activo;

        if($product->save()) {
            $result = Product::find($product->Co_Producto);
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
        Product::destroy($id);

        return response()->json([
            'results' => 'deteted'
        ]);
    }
}
