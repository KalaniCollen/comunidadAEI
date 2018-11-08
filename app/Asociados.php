<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asociados extends Model
{
  protected $table = 'asociados';
  protected $primaryKey = 'id_empresa';
  protected $fillable= [
  'id_empresa',
  ];
}
