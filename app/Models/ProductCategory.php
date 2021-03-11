<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductCategory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 't00290_producto_categoria';

    protected $primaryKey = 'Co_Poducto_Categoria';

    protected $fillable = [
        'Nb_Poducto_Categoria',
    ];

    protected $hidden = [
        'Co_Auditoria'
    ];

    public function products() {
        return $this->hasMany(Product::class, 'Co_Poducto_Categoria');
    }

    public function categories()
    {
        return $this->hasMany(ProductCategory::class, 'Co_Poducto_Categoria_Poducto_Categoria')->with('categories');
    }

    /*public function childCategories()
    {
        return $this->hasMany(ProductCategory::class, 'Co_Poducto_Categoria_Poducto_Categoria')->with('categories');
    }*/


    //Executed when loading model
    public static function boot()
    {
        parent::boot();

        $sql = '';

        DB::listen(function ($query) use (&$sql){

        });

        ProductCategory::created(function($category) use (&$sql) {

        });

        ProductCategory::retrieved(function($category) use (&$sql) {

        });

        ProductCategory::updated(function($category) use (&$sql) {

        });

        ProductCategory::deleted(function($category) use (&$sql) {

        });
    }

}
