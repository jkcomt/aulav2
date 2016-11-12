{!!Form::open(['url'=>'publicaciones','method'=>'GET','autocomplete'=>'off','role'=>'search'])!!}
<div class="form-group">
  <div class="input-group">
    {!!Form::text('searchtext',$searchtext,['class'=>'form-control','placeholder'=>'Buscar...'])!!}
    <span class="input-group-btn">
      <button class="btn btn-primary" type="submit">Buscar</button>
    </span>
  </div>
</div>
{!!Form::close()!!}
