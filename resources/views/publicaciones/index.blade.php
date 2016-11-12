@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de Publicaciones <a href="{{route('publicaciones.create')}}" class="btn btn-success">Nueva Publicación</a></h3>
      @include('publicaciones.search')
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <th>ID</th>
            <th>CURSO</th>
            <th>TÍTULO</th>
            <th>ACCIONES</th>
          </thead>
          <tbody>
            @foreach ($publicaciones as $publicacion)
              <tr>
                <td>{{$publicacion->id}}</td>
                <td>{{$publicacion->curso}}</td>
                <td>{{$publicacion->titulo}}</td>
                <td>
                  <a href="{{route('publicaciones.show',['id'=>$publicacion->id])}}" class="btn btn-warning">Mostrar</a>
                  <a href="{{route('publicaciones.edit',['id'=>$publicacion->id])}}" class="btn btn-info">Editar</a>
                  <a href="" data-target="#modal-delete-{{$publicacion->id}}" data-toggle="modal" class="btn btn-danger">Eliminar</a>
                </td>
              </tr>
              @include('publicaciones.modal')
            @endforeach
          </tbody>
        </table>
      </div>
      {{$publicaciones->render()}}
    </div>
  </div>
@endsection
