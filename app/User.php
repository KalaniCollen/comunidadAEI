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

    protected $searchableColumns = ['name', 'apellido_paterno','apellido_materno'];

    protected $fillable = [
        'email',
        'password',
        'confirmation_code',
        'name',
        'apellido_paterno',
        'apellido_materno',
        'privilegios_administrador',
        'notificacion_correo',
        'slug_usuario',
        'slug_empresa',
        'tipo_usuario',
        'status',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function perfil()
    {
        return $this->hasOne(Perfil_Usuario::class, 'id_usuario');
    }

    public function empresa()
    {
        return $this->hasOne(Perfil_Empresa::class, 'id_usuario');
    }

}
