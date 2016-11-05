@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-ms-6 col-xs-12">
      <h3>Nueva Curso</h3>
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {!!Form::open(['url'=>'escuela/cursos','method'=>'POST','autocomplete'=>'off'])!!}
      <div class="form-group">
        {!!Form::label('idgrado','Grado')!!}
        {!!Form::select('idgrado',$grados,null,['class'=>'form-control','placeholder'=>'Selecciona Grado']) !!}
      </div>
      <div class="form-group">
        {!!Form::label('curso','Curso')!!}
        {!!Form::text('curso',null,['class'=>'form-control','placeholder'=>'Curso...','value'=>"{{old('curso')}}"])!!}
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
      </div>
      {!!Form::close()!!}
    </div>
  </div>
@endsection
