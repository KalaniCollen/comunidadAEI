<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro_Invitado_Evento extends Model
{
    protected $table = 'registro_invitado_evento';
    protected $primaryKey = 'id_invitado';
    protected $fillable= [

    'id_invitado','nombre_invitado','apellido_invitado','correo_electronico_invitado',
    'edad_invitado','sexo_invitado',

    ];
}
