<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';
    protected $fillable = [
      'maestros_id',
      'cursos_id',
      'titulo',
      'contenido',
      'recurso',
      'fecha'
    ];
    public $timestamps = false;
    public function cursos(){
      return $this->belongsTo('App\Curso');
    }

}
