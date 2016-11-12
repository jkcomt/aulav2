@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de Tutorías</h3>
      @include('tutoria.search')
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <th>ID</th>
            <th>FECHA</th>
            <th>CURSO</th>
            <th>TÍTULO</th>
            <th>ACCIONES</th>
          </thead>
          <tbody>
            @foreach ($publicaciones as $publicacion)
              <tr>
                <td>{{$publicacion->id}}</td>
                <td>{{\Carbon\Carbon::parse($publicacion->fecha)->toDateString()}}</td>
                <td>{{$publicacion->curso}}</td>
                <td>{{$publicacion->titulo}}</td>
                <td>
                  <a href="{{route('publicaciones.show',['id'=>$publicacion->id])}}" class="btn btn-warning">Mostrar</a>
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
