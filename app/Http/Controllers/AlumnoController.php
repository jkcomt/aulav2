<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Grado;
use App\Alumno;
use DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\UserFormRequest;
class AlumnoController extends Controller
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
        $users = DB::table('users')
        ->where('nombres','like','%'.$query.'%')
        ->Where('tipo_usuario','=','Alumno')
        ->where('estado','=','Activo')
        ->orWhere('dni','like','%'.$query.'%')
        ->where('tipo_usuario','=','Alumno')
        ->where('estado','=','Activo')
        ->orderBy('id','desc')
        ->paginate('7');
        return view('miembros.alumnos.index',['users'=>$users,'searchtext'=>$query]);
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
      return view('miembros.alumnos.create',['grados'=>$grados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
      $user = new User;
      $user->tipo_usuario= 'Alumno';
      $user->estado = 'Activo';
      $user->nombres = $request['nombres'];
      $user->apellidos = $request['apellidos'];
      $user->dni = $request['dni'];
      $user->fecha_nacimiento = $request['fechanac'];
      $user->telefono = $request['telefono'];
      $user->direccion = $request['direccion'];
      $user->email = $request['email'];
      $user->password = bcrypt($request['dni']);
      $user->niveles_id = '3';
      if (Input::hasFile('imagen')) {
        $file = Input::file('imagen');
        $file->move(public_path().'/imagenes/persona',$file->getClientOriginalName());
        $user->imagen = $file->getClientOriginalName();
      }
      if ($user->save()) {
        $lastuser = User::all()->last();
        $maestro = new Alumno;
        $maestro->users_id = $lastuser->id;
        $maestro->grados_id = $request['idgrado'];
        $maestro->save();
      }
      return redirect('miembros/alumnos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = DB::table('users')
              ->join('alumnos','users.id','=','alumnos.users_id')
              ->join('grados','alumnos.grados_id','=','grados.id')
              ->join('niveles','niveles.id','=','users.niveles_id')
              ->select('users.*','grados.grado','niveles.nivel')
              ->where('users.id','=',$id)
              ->get()->first();

      $user2 = User::findOrFail($id);
      // dd($user->toArray());
      // dd($user);
      return view('miembros.alumnos.show',['user'=>$user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $grados = Grado::pluck('grado','id');
      $user = User::findOrFail($id);
      return view('miembros.alumnos.edit',['user'=>$user,'grados'=>$grados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
      {
        $user = User::findOrFail($id);
        $user->nombres = $request['nombres'];
        $user->apellidos = $request['apellidos'];
        $user->dni = $request['dni'];
        $user->fecha_nacimiento = $request['fechanac'];
        $user->telefono = $request['telefono'];
        $user->direccion = $request['direccion'];
        $user->email = $request['email'];
        if (Input::hasFile('imagen')) {
          $file = Input::file('imagen');
          $file->move(public_path().'/imagenes/persona',$file->getClientOriginalName());
          $user->imagen = $file->getClientOriginalName();
        }
        $user->update();
        return redirect('miembros/alumnos');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->estado = 'Inactivo';
      $user->update();
      return redirect('miembros/alumnos');
    }
}
