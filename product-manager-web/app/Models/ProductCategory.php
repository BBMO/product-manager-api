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

    /*protected $hidden = [
        'Co_Auditoria'
    ];*/

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
            $sql = $query;

            if(preg_match('/select \* from `(.*?)`/',$query->sql,$table)) {
                Audit::insertAudit($table[1], $sql, 'select');
            }

        });

        ProductCategory::created(function($category) use (&$sql) {
            if(preg_match('/into `(.*?)`/',$sql->sql,$table)) {
                $audit = Audit::insertAudit($table[1], $sql, 'insert');
                $category->Co_Auditoria = $audit->Co_Auditoria;
                $category->save();
            }
        });

        ProductCategory::updated(function($category) use (&$sql) {
            if(preg_match('/update `(.*?)`/',$sql->sql,$table) && !str_contains($sql->sql, 'Co_Auditoria')) {
                $audit = Audit::insertAudit($table[1], $sql, 'update');

                if($category->Co_Auditoria > 0) {
                    $audit->Co_Auditoria_Auditoria = $category->Co_Auditoria;
                    $audit->save();
                }

                $category->Co_Auditoria = $audit->Co_Auditoria;
                $category->save();
            }
        });

        ProductCategory::deleted(function($category) use (&$sql) {
            if(preg_match('/delete from `(.*?)`/',$sql->sql,$table)) {
                Audit::insertAudit($table[1], $sql, 'update');
            }
        });
    }

}
