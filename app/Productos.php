<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'costo',
        'imagen',
        'descripcion',
        'descuento',
        'tipo',
        'slug',
        'id_usuario'
    ];

    protected $hidden = [
        'id_producto'
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
     * Get the user that published products.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id_usuario');
    }
}
