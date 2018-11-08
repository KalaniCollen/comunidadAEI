<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';
    protected $primaryKey = 'Id_Album';
    protected $fillable= [
        'Id_Album','Slug_Album','Id_Usuario','Nombre',
    ];
}
