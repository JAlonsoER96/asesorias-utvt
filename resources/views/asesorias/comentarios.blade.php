<hr>
<h2>Comentarios: </h2>
<br>
@foreach($consulta as $c)
<div class="panel panel-info">
  <div class="panel-heading">
    <center><h3 class="panel-title">Comentado Por: {{ $c->comentado_por }}</h3></center>
  </div>
  <div class="panel-body">
    <div class="form-group">
      <label for="" class="control-label">Comentario:</label>
      <p class="lead" style="text-align: justify;">{{ $c->comentario }}</p>
      <br>
      @if ($c->archivo!="")
        <a href="{{ URL::action('ComentariosController@downloadFile',['archivo'=>$c->archivo]) }}" style="text-decoration: none;" target="_blank">
          {{ $c->archivo }}
        </a>
      @endif
    </div>
  </div>
  <div class="panel-footer"><center>Comentado el día: {{ $c->fecha_comentario }}</center></div>
</div>
@endforeach