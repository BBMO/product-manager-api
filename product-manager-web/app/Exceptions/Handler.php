<?php

namespace App\Exceptions;

use App\Models\Audit;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Auth;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {

            if (str_contains($e->getMessage(), 'SQL')) {

                $mac = exec('getmac');
                $mac = strtok($mac, ' ');

                $sql = explode('SQL:', $e->getMessage())[0];
                $table = '';
                $operation = '';
                if (str_contains($e->getMessage(), 'insert')) {
                    $afer_insert = explode('into', $e->getMessage());
                    $explode = explode(' ', $afer_insert[1]);

                    $table = str_replace('`', '', $explode[1]);
                    $operation = 'insert';
                } else if (str_contains($e->getMessage(), 'update')) {
                    $afer_insert = explode('update', $e->getMessage());
                    $explode = explode(' ', $afer_insert[2]);

                    $table = str_replace('`', '', $explode[1]);
                    $operation = 'update';
                }

                $audit = new Audit;
                $audit->Nb_Tabla = $table;
                $audit->Co_Tipo_Operacion = $operation;
                $audit->Tx_Sentencia = $sql;
                $audit->Co_Usuario = (isset($_SESSION['user'])) ? $_SESSION['user']->Co_Usuario : 0;
                $audit->Co_MAC = $mac;
                $audit->Co_IP = $_SERVER['REMOTE_ADDR'];
                $audit->Fe_Ins = date('Y-m-d H:i:s');
                $audit->Tx_Error = $e->getMessage();
                $audit->St_Error = 1;
                $audit->save();

            }

        });
    }
}
