<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
