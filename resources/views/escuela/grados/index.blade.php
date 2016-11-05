@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de Grados <a href="{{route('grados.create')}}" class="btn btn-success">Nuevo Grado</a></h3>
      @include('escuela.grados.search')
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <th>ID</th>
            <th>GRADO</th>
            <th>ACCIONES</th>
          </thead>
          <tbody>
            @foreach ($grados as $grado)
              <tr>
                <td>{{$grado->id}}</td>
                <td>{{$grado->grado}}</td>
                <td>
                  <a href="{{route('grados.edit',['id'=>$grado->id])}}" class="btn btn-info">Editar</a>
                  {{-- <a href="" data-target="#modal-delete-{{$grado->id}}" data-toggle="modal" class="btn btn-danger">Eliminar</a> --}}
                </td>
              </tr>
              @include('escuela.grados.modal')
            @endforeach
          </tbody>
        </table>
      </div>
      {{$grados->render()}}
    </div>
  </div>
@endsection
