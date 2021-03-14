<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

}
