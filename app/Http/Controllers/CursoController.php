<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Grado;
use App\Http\Requests\CursoFormRequest;
use DB;
class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
      if ($request) {
        $query = trim($request->get('searchtext'));
        $cursos = DB::table('cursos')
        ->join('grados','cursos.grados_id','=','grados.id')
        ->select('cursos.id','grados.grado','cursos.curso')
        ->where('cursos.curso','like','%'.$query.'%')
        ->orWhere('grados.grado','like','%'.$query.'%')
        ->orderBy('cursos.id','desc')
        ->paginate('7');
        return view('escuela.cursos.index',['cursos'=>$cursos,'searchtext'=>$query]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $grados = Grado::pluck('grado','id');
      return view('escuela.cursos.create',['grados'=>$grados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoFormRequest $request)
    {
        $curso = new Curso;
        $curso->grados_id = $request['idgrado'];
        $curso->curso = $request['curso'];
        $curso->save();

        return redirect('escuela/cursos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
