@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de Alumnos <a href="{{route('alumnos.create')}}" class="btn btn-success">Nuevo Alumno</a></h3>
      @include('miembros.alumnos.search')
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <th>ID</th>
            <th>DNI</th>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>ACCIONES</th>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->dni}}</td>
                <td>{{$user->nombres}}</td>
                <td>{{$user->apellidos}}</td>
                <td>
                  <a href="{{route('alumnos.show',['id'=>$user->id])}}" class="btn btn-warning">Detalles</a>
                  <a href="{{route('alumnos.edit',['id'=>$user->id])}}" class="btn btn-info">Editar</a>
                  <a href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal" class="btn btn-danger">Eliminar</a>
                </td>
              </tr>
              @include('miembros.alumnos.modal')
            @endforeach
          </tbody>
        </table>
      </div>
      {{$users->render()}}
    </div>
  </div>
@endsection
