<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
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
        $productCategory = ProductCategory::find($request->category);

        if(is_null($productCategory)) {
            return response()->json(['Mensaje'=>'No existe la categoria'],404);
        } else {
            $product = new Product;
            $product->Nb_Producto = $request->name;
            $product->Co_Poducto_Categoria = $request->category;
            $product->St_Activo = $request->active;
            $product->save();
            return redirect('/product/' . $product->Co_Producto);
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
        if(is_null($product)){
            return response()->json(['Mensaje'=>'No existe el producto'],404);
        } else {
            $productCategory = ProductCategory::find($request->category);

            if(is_null($productCategory)) {
                return response()->json(['Mensaje'=>'No existe la categoria'],404);
            } else {
                $product->Nb_Producto = (isset($request->name)) ? $request->name : $product->Nb_Producto;
                $product->Co_Poducto_Categoria = (isset($request->category)) ? $request->category : $product->Co_Poducto_Categoria;
                $product->St_Activo = (isset($request->active)) ? $request->active : $product->St_Activo;
                $product->save();
                return redirect('/product/' . $product->Co_Producto);
                // return response()->json(Product::find($product->Co_Producto),202);
            }
        }
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
