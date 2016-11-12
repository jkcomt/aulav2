<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
  protected $table = 'cursos';
  protected $fillable = ['curso','grados_id'];

  public $timestamps = false;

  public function grado(){
    return $this->belongsTo('App\Grado','grados_id');
  }

  public function publicaciones(){
    return $this->hasMany('App\Publicacion');
  }
}
