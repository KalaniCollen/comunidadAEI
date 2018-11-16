<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil_Usuario extends Model
{
    protected $table = 'perfil_usuario';
    protected $primaryKey = 'id_perfil';
    protected $fillable = [
        'name',
        'id_usuario',
        'fecha_nacimiento',
        'sexo',
        'telefono_movil',
        'imagen',
        'correo_electronico',
        'slug_usuario',

    ];

    public function getRouteKeyName()
    {
        return 'slug_usuario';
    }
}
