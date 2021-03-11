<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
            $sql = $query->sql;
        });

        Product::created(function($product) use (&$sql) {

        });

        Product::retrieved(function($product) use (&$sql) {

        });

        Product::updated(function($product) use (&$sql) {

        });

        Product::deleted(function($product) use (&$sql) {

        });

    }
}
