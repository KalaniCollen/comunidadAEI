<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil_Usuario extends Model
{
  protected $table = 'perfil_usuario';
    protected $primaryKey = 'Id_Perfil';
  protected $fillable = [
          'name','Id_Usuario','Fecha_Nacimiento','Sexo','slug','Telefono_Movil','Imagen','Correo_Electronico','Slug_Usuario',
      ];    //
      public function getRouteKeyName()
    {
      return 'slug';
    }
}
