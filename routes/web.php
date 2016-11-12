<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('layouts/app');
});

Route::group(['middleware'=>['auth','administrador']],function(){
  Route::resource('escuela/grados','GradoController');

  Route::resource('escuela/cursos','CursoController');

  Route::resource('miembros/maestros','MaestroController');

  Route::resource('miembros/alumnos','AlumnoController');
});

Route::resource('publicaciones','PublicacionesController');

Route::resource('tutoria','TutoriasController');
Auth::routes();

Route::get('/home', 'HomeController@index');
