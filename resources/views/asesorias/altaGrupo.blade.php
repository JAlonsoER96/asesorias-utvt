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
	<h1>Registro Grupo</h1>
	<form action="{{ route('guardaGrupo') }}" method="POST" enctype='multipart/form-data'>
		{{csrf_field()}}

		<input type="hidden" name="id_grupo" value="{{ $idgs }}">
		@if($errors->first('nombre')) 
			<div class="alert alert-danger"><i> {{ $errors->first('nombre') }} </i></div>
		@endif
		<center><div class="form-group label-floating">
			<label class="control-label">Usuario que crea el grupo:   {{ Session::get('sesionname') }}</label><br>
			<label class="control-label">Rol de usuario:   {{ Session::get('sesiontipo') }}</label><br>
			<label for="nombre" class="control-label">Seleccione la categoria:</label><br>
			<select name="id_categoria">
				@foreach($categorias as $categoria)
				<option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre_categoria }}</option>
				@endforeach
			</select>
		</div></center>
		<center><p><button class="btn btn-success">Registrar Grupo</button></p></center>
	</form><br><br>
</div>
@endsection