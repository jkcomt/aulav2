@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-ms-6 col-xs-12">
      <h3>Nuevo Maestro</h3>
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
 </div>
      {!!Form::open(['url'=>'miembros/maestros','method'=>'POST','autocomplete'=>'off','files'=>'true'])!!}
      <div class="row">

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
          <div class="form-group">
            {!!Form::label('nombres','Nombres')!!}
            {!!Form::text('nombres',null,['class'=>'form-control','placeholder'=>'Nombres...','value'=>"{{old('nombres')}}"])!!}
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
          <div class="form-group">
            {!!Form::label('apellidos','Apellidos')!!}
            {!!Form::text('apellidos',null,['class'=>'form-control','placeholder'=>'Apellidos...','value'=>"{{old('apellidos')}}"])!!}
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
          <div class="form-group">
            {!!Form::label('dni','DNI')!!}
            {!!Form::text('dni',null,['class'=>'form-control','placeholder'=>'DNI...','value'=>"{{old('dni')}}"])!!}
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
          <div class="form-group">
            {!!Form::label('fechanac','Fecha Nacimiento')!!}
            {!!Form::date('fechanac',null,['class'=>'form-control'])!!}
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
          <div class="form-group">
            {!!Form::label('telefono','Teléfono')!!}
            {!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Teléfono...','value'=>"{{old('telefono')}}"])!!}
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
          <div class="form-group">
            {!!Form::label('direccion','Dirección')!!}
            {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Dirección...','value'=>"{{old('direccion')}}"])!!}
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
          <div class="form-group">
            {!!Form::label('email','E-mail')!!}
            {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'E-Mail...','value'=>"{{old('direccion')}}"])!!}
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
          <div class="form-group">
            {!!Form::label('imagen','Imagen')!!}
            {!!Form::file('imagen',['class'=>'form-control','value'=>"{{old('imagen')}}"])!!}
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
          <div class="form-group">
            {!!Form::label('idgrado','Asignar Grado')!!}
            {!!Form::select('idgrado',$grados,null,['class'=>'form-control','placeholder'=>'Selecciona Grado']) !!}
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
          <div class="form-group">
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
      {!!Form::close()!!}

@endsection
