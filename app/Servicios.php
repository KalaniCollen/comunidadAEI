<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    protected $table = 'servicios';
    protected $primaryKey = 'id_servicio';
    protected $fillable = [
        'nombre',
        'imagen',
        'descripcion',
        'descuento',
        'tipo',
        'horario_inicio',
        'horario_cierre',
        'slug',
        'id_usuario'
    ];

    protected $hidden = [
        'id_servicio'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the name of the user who publishes a new service
     * @method user
     * @return \App\User
     */
    public function empresa() {
        return $this->belongsTo('App\Perfil_Empresa', 'id_empresa');
    }
}
