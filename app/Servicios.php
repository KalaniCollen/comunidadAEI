<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use Eloquence;

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
        'id_empresa'
    ];

    protected $hidden = [
        'id_servicio'
    ];

    protected $searchableColumns = [
        'nombre',
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
     * Get the name of the business who publishes a new service
     * @method user
     * @return \App\Perfil_Empresa
     */
    public function empresa()
    {
        return $this->belongsTo('App\Perfil_Empresa', 'id_empresa');
    }
}
