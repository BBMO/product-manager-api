<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany('Product');
    }

    public function categories()
    {
        return $this->hasMany(ProductCategory::class, 'Co_Poducto_Categoria_Poducto_Categoria');
    }

    public function childCategories()
    {
        return $this->hasMany(ProductCategory::class, 'Co_Poducto_Categoria_Poducto_Categoria')->with('categories');
    }


}
