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
        'Id_Usuario'
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
     * Get the user that published products.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'Id_Usuario');
    }
}
