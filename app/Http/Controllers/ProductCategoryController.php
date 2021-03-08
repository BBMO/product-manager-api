<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;


class ProductCategoryController extends Controller
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
            'results' => ProductCategory::with('categories')->get()
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
        $category = new ProductCategory;

        $category->Nb_Poducto_Categoria = $request->name;
        $category->Co_Poducto_Categoria_Poducto_Categoria = $request->parent;
        $category->St_Activo = $request->active;

        $category->save();
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
            'results' => ProductCategory::with('categories')->get()->find(['id' => $id])
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
        $category = ProductCategory::find($id);
        $category->Nb_Poducto_Categoria = $request->name;
        $category->Co_Poducto_Categoria_Poducto_Categoria = $request->parent;
        $category->St_Activo = $request->active;

        $category->save();
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
        ProductCategory::destroy($id);
    }
}
