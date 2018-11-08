<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
class User extends Authenticatable
{
    use Notifiable;
    use Eloquence;

     // default fields to search

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
      protected $primaryKey = 'id_usuario';
<<<<<<< HEAD
      protected $searchableColumns = ['name', 'Apellido_Paterno','Apellido_Materno'];
=======
      protected $searchableColumns = ['name', 'apellido_paterno','apellido_materno'];
>>>>>>> 27670647432db9b2bbc3629bab154ec4abeb3158
    protected $fillable = [
       'email', 'password','confirmation_code','name','apellido_paterno','apellido_materno','privilegios_administrador','notificacion_correo','slug_usuario',
       'slug_empresa',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function perfil(){
      return $this->hasOne(Perfil_Usuario::class);
    }

}