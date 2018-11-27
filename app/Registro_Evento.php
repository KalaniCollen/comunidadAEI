<?php

namespace ComunidadAEI;

use Illuminate\Database\Eloquent\Model;

class Registro_Evento extends Model
{
    protected $table = 'registro_evento';
    protected $primaryKey = 'id_registro_evento';
    protected $fillable= [

    'id_usuario','id_evento',

    ];
}
