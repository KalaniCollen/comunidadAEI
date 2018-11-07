<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'nombre',
        'imagen',
        'descripcion',
        'descuento',
        'tipo',
        'horario_inicio',
        'horario_cierre',
        'slug',
        'id_user'
    ];

    protected $hidden = [
        'id'
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
    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }
}
