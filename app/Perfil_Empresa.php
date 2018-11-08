<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil_Empresa extends Model
{
    //
    protected $table = 'perfil_empresa';
    protected $primaryKey = 'id_empresa';
    protected $fillable= [
<<<<<<< HEAD
    'Nombre_Empresa', 'id_usuario','Tipo_Empresa','Giro_Empresa',
    'Servicio_Empresa','Producto_Empresa','Logo_Empresa','Horario_Atencion',
    'Cantidad_Productos','Telefono_Fijo_Empresa','Telefono_Movil_Empresa',
    'Correo_Electronico_Empresa','Direccion_Empresa','Pag_Web_Empresa',
    'Red_Social_Twitter_Empresa','Red_Social_Facebook_Empresa','Red_Social_Whatsapp_Empresa',
    'Red_Social_Instagram','Mis_Logros','Slug_Empresa','Descripcion',
=======
    'nombre_empresa', 'id_usuario','tipo_empresa','giro_empresa',
    'servicio_empresa','producto_empresa','logo_empresa','horario_atencion',
    'cantidad_productos','telefono_fijo_empresa','Telefono_Movil_Empresa',
    'correo_electronico_empresa','direccion_empresa','pag_web_empresa',
    'red_social_twitter_empresa','Red_Social_Facebook_Empresa','Red_Social_Whatsapp_Empresa',
    'red_social_instagram','mis_logros','slug_empresa','descripcion',
>>>>>>> 27670647432db9b2bbc3629bab154ec4abeb3158
    ];

    public function getRouteKeyName()
{
    return 'slug';
}
}
