<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $fillable = [
        'nombre',
        'costo',
        'imagen',
        'descripcion',
        'descuento',
        'tipo',
        'slug',
        'id_empresa'
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
     * Get the empresa that published products.
     */
    public function empresa()
    {
        return $this->belongsTo('App\Perfil_Empresa', 'id_empresa');
    }
}
