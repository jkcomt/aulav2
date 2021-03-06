<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grados';
    protected $fillable = ['grado'];

    public $timestamps = false;

    public function curso(){
      return $this->hasMany('App\Curso','grados_id');
    }
}
