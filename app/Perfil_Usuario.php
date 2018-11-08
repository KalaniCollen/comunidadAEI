<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil_Usuario extends Model
{
  protected $table = 'perfil_usuario';
    protected $primaryKey = 'Id_Perfil';
  protected $fillable = [
<<<<<<< HEAD
          'name','id_usuario','Fecha_Nacimiento','Sexo','slug','Telefono_Movil','Imagen','Correo_Electronico','Slug_Usuario',
=======
          'name','id_usuario','fecha_nacimiento','sexo','slug','telefono_movil','imagen','correo_electronico','slug_usuario',
>>>>>>> 27670647432db9b2bbc3629bab154ec4abeb3158
      ];    //
      public function getRouteKeyName()
    {
      return 'slug';
    }
}
