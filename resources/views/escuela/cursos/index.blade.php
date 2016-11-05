@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de Cursos <a href="{{route('cursos.create')}}" class="btn btn-success">Nuevo Curso</a></h3>
      @include('escuela.cursos.search')
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <th>ID</th>
            <th>GRADO</th>
            <th>CURSO</th>
            <th>ACCIONES</th>
          </thead>
          <tbody>
            @foreach ($cursos as $curso)
              <tr>
                <td>{{$curso->id}}</td>
                <td>{{$curso->grado}}</td>
                <td>{{$curso->curso}}
                <td>
                  <a href="{{route('cursos.edit',['id'=>$curso->id])}}" class="btn btn-info">Editar</a>
                  {{-- <a href="" data-target="#modal-delete-{{$grado->id}}" data-toggle="modal" class="btn btn-danger">Eliminar</a> --}}
                </td>
              </tr>
              @include('escuela.cursos.modal')
            @endforeach
          </tbody>
        </table>
      </div>
      {{$cursos->render()}}
    </div>
  </div>
@endsection
