<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grado;
use App\Http\Requests\GradoFormRequest;
class GradoController extends Controller
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
        $grados = Grado::where('grado','like','%'.$query.'%')
        ->orderBy('id','desc')
        ->paginate('7');

        return view('escuela.grados.index',['grados'=>$grados,'searchtext'=>$query]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escuela.grados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradoFormRequest $request)
    {
      $grado = new Grado;
      $grado->grado = $request['grado'];
      $grado->save();

      return redirect('escuela/grados');
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
        return view('escuela.grados.edit',["grado"=>Grado::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradoFormRequest $request, $id)
    {
      $grado = Grado::findOrFail($id);
      $grado->grado = $request['grado'];
      $grado->save();

      return redirect('escuela/grados');
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
