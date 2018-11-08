<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
  protected $table = 'videos';
  protected $primaryKey = 'id_video';
  protected $fillable= [

  'id_video','enlace','codigo','id_usuario','tipo',

  ];
}
