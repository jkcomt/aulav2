@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-ms-6 col-xs-12">
      <h3>Editar Grado: {{$grado->grado}}</h3>
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {!!Form::model($grado,['method'=>'PATCH','route'=>['grados.update','id'=>$grado->id]])!!}
      <div class="form-group">
        {!!Form::label('grado','Grado')!!}
        {!!Form::text('grado',null,['class'=>'form-control','placeholder'=>'Grado...','value'=>"{{old('grado')}}"])!!}
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
      </div>
      {!!Form::close()!!}
    </div>
  </div>
@endsection
