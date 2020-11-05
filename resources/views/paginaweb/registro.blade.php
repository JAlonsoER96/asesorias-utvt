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
	<h1>Registro de usuarios</h1><br><br>
	<form action="{{ route('guardaRegistro') }}" method="POST" enctype='multipart/form-data'>
		{{csrf_field()}}

		<input type="hidden" name="id_usuario" value="{{ $id }}">
		@if($errors->first('nombre')) 
			<div class="alert alert-danger"><i> {{ $errors->first('nombre') }} </i></div>
		@endif

		<div class="form-group label-floating">
			<label for="nombre" class="control-label">Nombre (s):</label>
			<input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
		</div>

		@if($errors->first('app')) 
			<div class="alert alert-danger"><i> {{ $errors->first('app') }} </i></div> 
		@endif

		<div class="form-group label-floating">
			<label for="app" class="control-label">Apellido Paterno</label>
			<input type="text" name="app" class="form-control" value="{{ old('app') }}">
		</div>

		@if($errors->first('apm')) 
			<div class="alert alert-danger"><i> {{ $errors->first('apm') }} </i></div> 
		@endif


		<div class="form-group label-floating">
			<label for="apm" class="control-label">Apellido Materno</label>
			<input type="text" name="apm" class="form-control" value="{{ old('apm') }}">
		</div>

		@if($errors->first('edad')) 
			<div class="alert alert-danger"><i> {{ $errors->first('edad') }} </i></div> 
		@endif

		<div class="form-group label-floating">
			<label for="edad" class="control-label">Edad:</label>
			<input type="text" name="edad" class="form-control" value="{{ old('edad') }}">
		</div>

		@if($errors->first('email')) 
			<div class="alert alert-danger"><i> {{ $errors->first('email') }} </i></div> 
		@endif

		<div class="form-group label-floating">
			<label for="email">Correo Electronico:</label>
			<input type="text" name="email" class="form-control" value="{{ old('email') }}">
		</div>

		@if($errors->first('telefono')) 
			<div class="alert alert-danger"><i> {{ $errors->first('telefono') }} </i></div> 
		@endif


		<div class="form-group label-floating">
			<label for="telefono">Teléfono:</label>
			<input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
		</div>

		@if($errors->first('contrasena')) 
			<div class="alert alert-danger"><i> {{ $errors->first('contrasena') }} </i></div> 
		@endif


		<div class="form-group label-floating">
			<label for="contrasena" class="control-labelon">Contraseña:</label>
			<input type="password" name="contrasena" class="form-control" value="{{ old('contrasena') }}">
		</div>
		
		@if($errors->first('tipo_usuario')) 
			<div class="alert alert-danger"><i> {{ $errors->first('tipo_usuario') }} </i></div>
		@endif

		<div class="form-group label-floating">
			<label for="tipo_usuario" class="control-label">Tipo de usuario:</label>
			<select name="tipo_usuario">
				<option value="">Seleccione: </option>
				<option value="Alumno">Alumno</option>
				<option value="Profesor">Profesor</option>
			</select>
		</div>

		
		<p><button class="btn btn-primary">Registrarse!</button></p>
</form>
</div>
@endsection