<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
  protected $table = 'videos';
  protected $primaryKey = 'Id_Video';
  protected $fillable= [
  'Id_Video','Enlace','Codigo','Id_Usuario',
  ];
}
