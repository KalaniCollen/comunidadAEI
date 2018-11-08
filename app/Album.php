<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  protected $table = 'album';
  protected $primaryKey = 'id_album';
  protected $fillable= [
  'id_album','slug_album','id_usuario','nombre',
  ];
}
