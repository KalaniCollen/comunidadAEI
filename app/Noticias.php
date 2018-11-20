<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $table = "noticias";
    protected $primaryKey = "id_noticia";
    protected $fillable = [
        'imagen',
        'titulo',
        'contenido',
        'slug',
        'id_empresa',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'id_noticia'
    ];
}
