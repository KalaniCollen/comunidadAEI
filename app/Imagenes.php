<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
  protected $table = 'imagenes';
  protected $primaryKey = 'id_imagen';
  protected $fillable= [
  'id_imagen','direccion','id_album',
  ];
}