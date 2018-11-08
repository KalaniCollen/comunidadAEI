<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
  protected $table = 'imagenes';
  protected $primaryKey = 'Id_Imagen';
  protected $fillable= [
  'Id_Imagen','Direccion','Id_Album',
  ];
}
