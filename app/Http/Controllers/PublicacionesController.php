<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Http\Requests\PublicacionFormRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
class PublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $maestroid = \Auth::user()->maestro->id;
      if ($request) {
        $query = trim($request->get('searchtext'));
        $publicaciones = \DB::table('publicaciones')
        ->join('cursos','cursos.id','=','publicaciones.cursos_id')
        ->where('titulo','like','%'.$query.'%')
        ->where('maestros_id','=',$maestroid)
        ->where('estado','=','Activo')
        ->select('publicaciones.id as id','cursos.curso as curso','publicaciones.titulo as titulo')
        ->orderBy('publicaciones.id','desc')
        ->paginate('7');
        return view('publicaciones.index',['publicaciones'=>$publicaciones,'searchtext'=>$query]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = \DB::table('cursos')
        ->join('grados','grados.id','=','cursos.grados_id')
        ->join('maestros','grados.id','=','maestros.grados_id')
        ->where('maestros.id','=',\Auth::user()->maestro->id)
        ->pluck('cursos.curso','cursos.id');
        return view('publicaciones.create',['cursos'=>$cursos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicacionFormRequest $request)
    {
      $publicacion = new Publicacion;
      $publicacion->maestros_id = \Auth::user()->maestro->id;
      $publicacion->cursos_id = $request['idcurso'];
      $publicacion->titulo = $request['titulo'];
      $publicacion->contenido = $request['contenido'];
      if (Input::hasFile('recurso')) {
        $file = Input::file('recurso');
        $file->move(public_path().'/publicacion',$file->getClientOriginalName());
        $publicacion->recurso = $file->getClientOriginalName();
      }
      $publicacion->fecha = Carbon::now();
      $publicacion->estado = "Activo";
      $publicacion->save();
      return redirect('publicaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        return view('publicaciones.show',['publicacion'=>$publicacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cursos = \DB::table('cursos')
      ->join('grados','grados.id','=','cursos.grados_id')
      ->join('maestros','grados.id','=','maestros.grados_id')
      ->where('maestros.id','=',\Auth::user()->maestro->id)
      ->pluck('cursos.curso','cursos.id');
      $publicacion = Publicacion::findOrFail($id);
      return view('publicaciones.edit',['publicacion'=>$publicacion,'cursos'=>$cursos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublicacionFormRequest $request, $id)
    {
      $publicacion = Publicacion::findOrFail($id);
      $publicacion->maestros_id = \Auth::user()->maestro->id;
      $publicacion->cursos_id = $request['idcurso'];
      $publicacion->titulo = $request['titulo'];
      $publicacion->contenido = $request['contenido'];
      if (Input::hasFile('recurso')) {
        $file = Input::file('recurso');
        $file->move(public_path().'/publicacion',$file->getClientOriginalName());
        $publicacion->recurso = $file->getClientOriginalName();
      }
      $publicacion->fecha = Carbon::now();
      $publicacion->save();
      return redirect('publicaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        $publicacion->estado = "Inactivo";
        $publicacion->save();
        return redirect('publicaciones');
    }

}
