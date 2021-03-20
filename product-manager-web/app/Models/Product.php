<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 't00300_producto';

    protected $primaryKey = 'Co_Producto';

    protected $fillable = [
        'Nb_Producto',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'Co_Producto');
    }

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

        Product::created(function($product) use (&$sql) {
            if(preg_match('/into `(.*?)`/',$sql->sql,$table)) {
                $audit = Audit::insertAudit($table[1], $sql, 'insert');
                $product->Co_Auditoria = $audit->Co_Auditoria;
                $product->save();
            }
        });

        Product::updated(function($product) use (&$sql) {
            if(preg_match('/update `(.*?)`/',$sql->sql,$table) && !str_contains($sql->sql, 'Co_Auditoria')) {
                $audit = Audit::insertAudit($table[1], $sql, 'update');

                if($product->Co_Auditoria > 0) {
                    $audit->Co_Auditoria_Auditoria = $product->Co_Auditoria;
                    $audit->save();
                }

                $product->Co_Auditoria = $audit->Co_Auditoria;
                $product->save();
            }
        });

        Product::deleted(function($product) use (&$sql) {
            if(preg_match('/delete from `(.*?)`/',$sql->sql,$table)) {
                Audit::insertAudit($table[1], $sql, 'update');
            }
        });

    }
}
