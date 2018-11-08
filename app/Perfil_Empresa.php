<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil_Empresa extends Model
{
    //
    protected $table = 'perfil_empresa';
    protected $primaryKey = 'Id_Empresa';
    protected $fillable= [
    'Nombre_Empresa', 'id_usuario','Tipo_Empresa','Giro_Empresa',
    'Servicio_Empresa','Producto_Empresa','Logo_Empresa','Horario_Atencion',
    'Cantidad_Productos','Telefono_Fijo_Empresa','Telefono_Movil_Empresa',
    'Correo_Electronico_Empresa','Direccion_Empresa','Pag_Web_Empresa',
    'Red_Social_Twitter_Empresa','Red_Social_Facebook_Empresa','Red_Social_Whatsapp_Empresa',
    'Red_Social_Instagram','Mis_Logros','Slug_Empresa','Descripcion',
    ];

    public function getRouteKeyName()
{
    return 'slug';
}
}
