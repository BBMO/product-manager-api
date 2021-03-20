<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $table = 't00100_usuario';

    protected $primaryKey = 'Co_Usuario';

    protected $fillable = [
        'Nb_Usuario',
        'Tx_Email',
        'Nu_Movil',
        'Tx_Clave'
    ];

    protected $hidden = [
        'Tx_Clave'
    ];

    //Executed when loading model
    public static function boot()
    {
        parent::boot();

        $sql = '';

        DB::listen(function ($query) use (&$sql) {

            $sql = $query;

            if(preg_match('/select \* from `(.*?)`/',$query->sql,$table)) {
                Audit::insertAudit($table[1], $sql, 'select');
            }

        });

        User::created(function($user) use (&$sql) {
            if(preg_match('/into `(.*?)`/',$sql->sql,$table)) {
                $audit = Audit::insertAudit($table[1], $sql, 'insert');
                $user->Co_Auditoria = $audit->Co_Auditoria;
                $user->save();
            }
        });

        User::updated(function($user) use (&$sql) {
            if(preg_match('/update `(.*?)`/',$sql->sql,$table) && !str_contains($sql->sql, 'Co_Auditoria')) {
                $audit = Audit::insertAudit($table[1], $sql, 'update');

                if($user->Co_Auditoria > 0) {
                    $audit->Co_Auditoria_Auditoria = $user->Co_Auditoria;
                    $audit->save();
                }

                $user->Co_Auditoria = $audit->Co_Auditoria;
                $user->save();
            }
        });

        User::deleted(function($user) use (&$sql) {
            if(preg_match('/delete from `(.*?)`/',$sql->sql,$table)) {
                Audit::insertAudit($table[1], $sql, 'update');
            }
        });
    }
}
