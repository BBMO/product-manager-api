<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'results' => ProductCategory::whereNull('Co_Poducto_Categoria_Poducto_Categoria')->with('categories')->get()
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

        if($category->save()) {
            $result = ProductCategory::find($category->Co_Poducto_Categoria);
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
    public function show(Request $request, $id)
    {
        //
        if($request->get_products == 1) {
            $results = ProductCategory::with('products')->get()->find($id);
        }
        else {
            $results = ProductCategory::with('categories')->get()->find($id);
        }

        return response()->json([
            'results' => $results
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
        $category->Nb_Poducto_Categoria = (isset($request->name)) ? $request->name : $category->Nb_Poducto_Categoria;
        $category->Co_Poducto_Categoria_Poducto_Categoria = (isset($request->parent)) ? $request->parent : $category->Co_Poducto_Categoria_Poducto_Categoria;
        $category->St_Activo = (isset($request->active)) ? $request->active : $category->St_Activo;

        if($category->save()) {
            $result = ProductCategory::find($category->Co_Poducto_Categoria);
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
        ProductCategory::destroy($id);

        return response()->json([
            'results' => 'deteted'
        ]);
    }
}
