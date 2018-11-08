<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil_Empresa extends Model
{
    //
    protected $table = 'perfil_empresa';
    protected $primaryKey = 'id_empresa';
    protected $fillable= [
    'nombre_empresa', 'id_usuario','tipo_empresa','giro_empresa',
    'servicio_empresa','producto_empresa','logo_empresa','horario_atencion',
    'cantidad_productos','telefono_fijo_empresa','Telefono_Movil_Empresa',
    'correo_electronico_empresa','direccion_empresa','pag_web_empresa',
    'red_social_twitter_empresa','Red_Social_Facebook_Empresa','Red_Social_Whatsapp_Empresa',
    'red_social_instagram','mis_logros','slug_empresa','descripcion',
    ];

    public function getRouteKeyName()
{
    return 'slug';
}
}
