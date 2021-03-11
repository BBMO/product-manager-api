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

        $category->save();
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
            $results = ProductCategory::with('products')->find($id)->get()->dd();
        }
        else {
            $results = ProductCategory::with('categories')->find($id)->get();
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
