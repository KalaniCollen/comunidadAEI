<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asociados extends Model
{
    protected $table = 'Asociados';
    protected $primaryKey = 'Id_Empresa';
    protected $fillable= [
        'Id_Empresa',
    ];
}
