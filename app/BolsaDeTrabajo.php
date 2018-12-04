<?php

namespace ComunidadAEI;

use Illuminate\Database\Eloquent\Model;

class BolsaDeTrabajo extends Model
{
    protected $table = 'bolsa_trabajo';
    protected $primaryKey = 'id_trabajo';
    protected $fillable= [
'nombre','empresa','direccion','descripcion','salario','telefono',
    ];

}
