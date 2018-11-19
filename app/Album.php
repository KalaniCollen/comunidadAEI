<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    protected $table = 'album';
    protected $primaryKey = 'id_album';
    protected $fillable= [
        'id_album',
        'slug_album',
        'id_usuario',
        'nombre',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug_album';
    }

}
