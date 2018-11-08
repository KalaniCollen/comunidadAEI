<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
<<<<<<< HEAD
    protected $table = 'album';
    protected $primaryKey = 'Id_Album';
    protected $fillable= [
        'Id_Album','Slug_Album','id_usuario','Nombre',
    ];
=======
  protected $table = 'album';
  protected $primaryKey = 'id_album';
  protected $fillable= [
  'id_album','slug_album','id_usuario','nombre',
  ];
>>>>>>> 27670647432db9b2bbc3629bab154ec4abeb3158
}
