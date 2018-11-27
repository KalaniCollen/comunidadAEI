<?php

namespace ComunidadAEI;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{

    protected $table = 'evento';
    protected $primaryKey = 'id_evento';
    protected $fillable= [
        'nombre_evento',
        'descripcion_evento',
        'fecha_inicio',
        'fecha_final',
        'tipo',
        'num_invitados',
        'costo_asociado',
        'costo_no_asociado',
        'ponente',
        'organizador',
        'correo_electronico_organizador',
        'telefono_organizador',
        'slug_evento',
        'id_usuario',
        'direccion_evento',
        'estado_evento',
    ];

    public function getRouteKeyName()
    {
        return 'slug_evento';
    }
}
