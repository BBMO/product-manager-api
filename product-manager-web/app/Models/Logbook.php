<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Logbook extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 't99999_bitacora';

    protected $primaryKey = 'Co_Bitacora';

    public function getLastRecordByUser($id) {
        return DB::table('t99999_bitacora')->select('*')->where('Co_Usuario', $id)->orderBy('Co_Bitacora','desc')->first();
    }

}
