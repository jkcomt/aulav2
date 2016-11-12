<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_usuario',
        'estado',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'email',
        'password',
        'niveles_id',
        'imagen',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function maestro()
    {
      return $this->hasOne('App\Maestro','users_id');
    }

    public function alumno()
    {
      return $this->hasOne('App\Alumno','users_id');
    }

    public function hasNivel($nivel)
    {
      return $this->niveles_id == $nivel;
    }
}
