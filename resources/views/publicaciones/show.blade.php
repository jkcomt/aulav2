@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <h3>{{$publicacion->titulo}}</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10 col-md-10">
          <p>{{$publicacion->contenido}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10 col-md-10">
          <h4>Recurso</h4>
          <a href="{{asset('publicacion/'.$publicacion->recurso)}}">{{$publicacion->recurso}}</a>
        </div>
      </div>
    </div>
  </div>
@endsection
