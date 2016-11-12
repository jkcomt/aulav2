@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-ms-6 col-xs-12">
      <h3>Nueva Publicación</h3>
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {!!Form::open(['url'=>'publicaciones','method'=>'POST','autocomplete'=>'off','files'=>'true'])!!}
      <div class="form-group">
        {!!Form::label('idcurso','Curso')!!}
        {!!Form::select('idcurso',$cursos,null,['class'=>'form-control','placeholder'=>'Selecciona Curso']) !!}
      </div>
      <div class="form-group">
        {!!Form::label('titulo','Título')!!}
        {!!Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Título...','value'=>"{{old('titulo')}}"])!!}
      </div>
      <div class="form-group">
        {!!Form::textarea('contenido',null,['rows'=>'4','class'=>'form-control','placeholder'=>'Contenido...','value'=>"{{old('contenido')}}"])!!}
      </div>
      <div class="form-group">
        {!!Form::label('recurso','Adjuntar Recurso')!!}
        {!!Form::file('recurso',['class'=>'form-control','value'=>"{{old('recurso')}}"])!!}
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
      </div>
      {!!Form::close()!!}
    </div>
  </div>
@endsection
