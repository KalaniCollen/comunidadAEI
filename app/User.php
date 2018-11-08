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
      protected $primaryKey = 'Id_Usuario';
      protected $searchableColumns = ['name', 'Apellido_Paterno','Apellido_Materno'];
    protected $fillable = [
       'email', 'password','confirmation_code','name','Apellido_Paterno','Apellido_Materno','Notificacion_Correo','Slug_Usuario',
       'Slug_Empresa',
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
