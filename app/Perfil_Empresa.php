<?php

namespace ComunidadAEI;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Perfil_Empresa extends Model
{
    use Eloquence;
    //
    protected $table = 'perfil_empresa';
    protected $primaryKey = 'id_empresa';
    protected $fillable= [
        'nombre_empresa',
        'id_usuario',
        'tipo_empresa',
        'giro_empresa',
        'servicio_empresa',
        'producto_empresa',
        'logo_empresa',
        'horario_atencion',
        'cantidad_productos',
        'telefono_fijo_empresa',
        'Telefono_Movil_Empresa',
        'correo_electronico_empresa',
        'direccion_empresa',
        'pag_web_empresa',
        'red_social_twitter_empresa',
        'red_social_facebook_empresa',
        'red_social_instagram',
        'mis_logros',
        'slug_empresa',
        'descripcion',
        'img_logros',
    ];

    protected $searchable = [
        'nombre_empresa'
    ];

    public function getRouteKeyName()
    {
        return 'slug_empresa';
    }
}
