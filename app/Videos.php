<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
  protected $table = 'videos';
  protected $primaryKey = 'id_video';
  protected $fillable= [
<<<<<<< HEAD
  'Id_Video','Enlace','Codigo','id_usuario',
=======
  'id_video','enlace','codigo','id_usuario','tipo',
>>>>>>> 27670647432db9b2bbc3629bab154ec4abeb3158
  ];
}
