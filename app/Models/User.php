<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 't00100_usuario';

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
