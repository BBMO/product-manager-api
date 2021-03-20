<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Audit extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 't99999_auditoria';

    protected $primaryKey = 'Co_Auditoria';

    public static function insertAudit ($table_name, $query, $operation) {
        if(!isset($_SESSION)) {
            session_start();
        }

        $sql = $query->sql;
        foreach($query->bindings as $binding)
        {
            $value = is_numeric($binding) ? $binding : "'".$binding."'";
            $sql = preg_replace('/\?/', $value, $sql, 1);
        }

        $mac = exec('getmac');
        $mac = strtok($mac, ' ');

        $audit = new Audit;
        $audit->Nb_Tabla = $table_name;
        $audit->Co_Tipo_Operacion = $operation;
        $audit->Tx_Sentencia = $sql;
        $audit->Co_Usuario = (isset($_SESSION['user'])) ? $_SESSION['user']->Co_Usuario : 0;
        $audit->Co_MAC = $mac;
        $audit->Co_IP = $_SERVER['REMOTE_ADDR'];
        $audit->Fe_Ins = date('Y-m-d H:i:s');
        $audit->save();

        return $audit;
    }

}
