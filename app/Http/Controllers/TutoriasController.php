<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutoriasController extends Controller
{
  public function index(Request $request)
  {
    $alumnoid = \Auth::user()->alumno->id;

    if ($request) {
      $query = trim($request->get('searchtext'));
      $publicaciones = \DB::table('publicaciones')
      ->join('cursos','cursos.id','=','publicaciones.cursos_id')
      ->join('grados','grados.id','=','cursos.grados_id')
      ->join('alumnos','alumnos.grados_id','=','grados.id')
      ->where('titulo','like','%'.$query.'%')
      ->where('alumnos.id','=',$alumnoid)
      ->orWhere('cursos.curso','like','%'.$query.'%')
      ->where('alumnos.id','=',$alumnoid)
      ->orderBy('publicaciones.fecha','desc')
      ->paginate('7');

      return view('tutoria.index',['publicaciones'=>$publicaciones,'searchtext'=>$query]);
    }
  }
}
