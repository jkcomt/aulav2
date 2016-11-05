<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
  protected $table = "alumnos";

  protected $fillable = [
    'users_id',
    'grados_id'
  ];

  public $timestamps = false;

  public function user()
  {
    return $this->belongsTo('App\User','users_id');
  }

}
