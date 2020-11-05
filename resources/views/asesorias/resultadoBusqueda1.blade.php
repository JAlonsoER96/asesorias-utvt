<hr>
<br>
<h2>Resultado de la busqueda</h2>
@foreach($resultado as $g)
<div class="card">
	<div class="card-body">
		<div class="card-title">
			<h3>Categoria: {{ $g->categoria }}</h3>
		</div>
		<div class="card-text">
			<p>Creado Por: {{ $g->creado_por }}</p>
		</div>
		<p><a href= "{{ URL::action('GruposController@unirseG',[$g->id_grupo]) }}"><button class="btn btn-success">Unirse</button></a></p>
	</div>
</div>
@endforeach