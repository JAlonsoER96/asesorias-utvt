@extends('paginaweb.plantilla')
@section('contenido')
<div class="container-fluid">
@if(session()->has('msj'))
	<div class="alert alert-danger" role="alert">
		<strong>{{ session('msj') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif
	@if($tp == "Profesor")
	<h1>Mis Grupos Creados</h1><br>
	<div class="row">
	@foreach($grupos as $grupo)
		<div class="col-lg-4 col-md-8 col-xs-8">
			<div class="card">
				<div class="card-body">
					<h2 class="card-title">Numero de Grupo: {{ $grupo->id_grupo }}</h2>
					<p class="card-text"><h3>Categoria: {{ $grupo->categoria }}</h3></p>
					<p class="card-text"><h3>Creado : {{ $grupo->created_at }}</h3></p>
					<p>
						<a class="btn btn-danger lista" data-id="{{ $grupo->id_grupo }}">Lista Miembros</a>
						<a href="{{ URL::action('PostsController@postGrupo',['id_grupo'=>$grupo->id_grupo]) }}" class="btn btn-info">Ver posts</a>
					</p>
				</div>
			</div>
		</div>
	@endforeach
	</div>
	<div class="col-lg-8 col-md-8 col-xs-8" id="lista-alumnos">
		
	</div>
	@endif
	@if($tp == 'Alumno')
	<h1>Mis grupos</h1>
		@foreach($consulta as $g)
		<div class="col-lg-4 col-md-8 col-xs-8">
			<div class="card">
				<div class="card-body">
					<h2 class="card-title">Categoria Grupo: {{ $g->categoria }}</h2>
					<p class="card-text"><h3>Fecha de Registro: {{ $g->fecha }}</h3></p>
					<a href="{{ URL::action('PostsController@postGrupo',['id_grupo'=>$g->id_grupo]) }}"><button class="btn btn-success btn-lg btn-raised">Ver Posts</button></a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
		<hr>
	<h4 class="header-title">Buscar</h4><br>
	@include('asesorias.busqueda')
	@endif
@push('script')
<br><br>
<script>
	$(document).ready(function(){
		
		$('.lista').on('click',function(e){

			e.preventDefault();
			var id_grupo = $(this).data('id');
			$('#lista-alumnos').load('{{ url('listaIns') }}' + '?idg='+id_grupo);
		});
	});
</script>
@endpush
</div>
<br><br><br>
@endsection