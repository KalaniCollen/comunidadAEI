<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil_Usuario extends Model
{
  protected $table = 'perfil_usuario';
    protected $primaryKey = 'Id_Perfil';
  protected $fillable = [

          'name','id_usuario','fecha_nacimiento','sexo','slug','telefono_movil','imagen','correo_electronico','slug_usuario',

      ];    //
      public function getRouteKeyName()
    {
      return 'slug';
    }
}
