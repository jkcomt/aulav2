@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
        <h2 class="text-left">Datos
          <a href="{{route('maestros.edit',['id'=>$user->id])}}" class="btn btn-info">Editar</a>
        </h2>
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        <img src="{{asset('/imagenes/persona/'.$user->imagen)}}" alt="" width="160px" height="175px"/>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <table class="table table-striped">
          <tr>
            <td><h4>Nombre: </h4></td>
            <td><h4>{{$user->nombres}} {{$user->apellidos}}</h4></td>
          </tr>
          <tr>
            <td><h4>DNI: </h4></td>
            <td><h4>{{$user->dni}}</h4></td>
          </tr>
          <tr>
            <td><h4>E-MAIL: </h4></td>
            <td><h4>{{$user->email}}</h4></td>
          </tr>
          <tr>
            <td><h4>Teléfono: </h4></td>
            <td><h4>{{$user->telefono}}</h4></td>
          </tr>
          <tr>
            <td><h4>Dirección: </h4></td>
            <td><h4>{{$user->direccion}}</h4></td>
          </tr>
          <tr>
            <td><h4>Grado Asignado</h4></td>
            <td><h4>{{$user->grado}}</h4></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
@endsection
