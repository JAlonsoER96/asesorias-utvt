@extends('paginaweb.plantilla')
@section('contenido')
@if(session()->has('msj'))
	<div class="alert alert-danger" role="alert">
		<strong>{{ session('msj') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif
<br>
<div class="col-lg-12 col-md-4 col-xs4">
	<button class="btn btn-success" id="btn-postear">Crear Post</button><br><br>
</div>
<hr>
<br>
@foreach($consulta as $post)
<div class="panel panel-primary">
	<div class="panel-heading">
		<p class="panel-title">
			{{ $post->titulo }}
		</p>
	</div>
	<div class="panel-body">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<p style="text-align: justify;">{{ $post->cuerpo_post }}</p>
			<br>
			@if ($post->archivo !="")
				<a href="{{ URL::action('ComentariosController@downloadFile',['archivo'=>$post->archivo]) }}" style="text-decoration: none;" target="_blank">
          {{ $post->archivo }}
        </a>
			@endif
			<hr>
		</div>
		<div class="row" id="comentarios">
			<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
				<form action="{{ route('guardaComentario') }}" method="POST" enctype='multipart/form-data'>
					{{ csrf_field() }}

					<input name="idp" hidden value="{{ $post->id_post }}" id="id_p">
					@if($errors->first('comentario')) 
					<div class="alert alert-danger"><i> {{ $errors->first('comentario') }} </i></div>
					@endif
					<div class="form-group">
						<label class="control-label">Comentar Post</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="comentario" value="{{ old('comentario') }}"></textarea>
					</div>
					@if($errors->first('archivo')) 
					<div class="alert alert-danger"><i> {{ $errors->first('archivo') }} </i></div>
					@endif
					<div class="form-group">
						<label class="control-label">Archivo</label>
						<input type="file" name="archivo">
					</div>
					<p><button class="btn btn-success" id="btn-c">Comentar</button></p>
				</form>
				<div id="comments{{ $post->id_post }}">
					
				</div>
			</div>
		</div>
		<hr>
		<div class="col-lg-12 col-md-12 col-xs-12">
			<p style="text-align:center;" id="botones">
				<a class="btn-ver" data-id='{{ $post->id_post }}'><button class="btn btn-info" id="btn-coment">Ver Comentarios</button></a>
			</p>
		</div>
	</div>
	<div class="panel-footer"><center>Posteado el día: {{ $post->fecha_post }}</center></div>
</div>
@endforeach

<div id="modal">
	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Cear Post</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ route('saveP') }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" name="idg" value="{{ $idg }}" id="id_grupo">

						<div class="form-group label-floating" hidden>
							<label class="control-label">Numero Post</label>
							<input type="text" class="form-control" name="id_post" value="{{ $idps }}" readonly="">
						</div>

						<div class="form-group label-floating">
							<label class="control-label">Titulo Post</label>
							<input type="text" class="form-control" name="ttl">
						</div>

						<div class="form-group label-floating">
							<label class="control-label">Descipción:</label>
							<textarea name="cp" id="" cols="30" rows="10" class="form-control"></textarea>
						</div>

						<div class="form-group label-floating">
							<label class="control-label">Archivo</label>
							<input type="file" name="arcv">
						</div>
						<p><button class="btn btn-success"> Enviar</button></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@push('script')
<br><br>
<script>
	$(document).ready(function(){
		$('#btn-postear').on('click',function(){
			$('#exampleModalLong').modal("show");
		});
		$('.btn-ver').on('click',function(e){
			e.preventDefault();
			var id_post = $(this).data('id');
			$('#comments'+id_post).load('{{ url('mostrarComentarios') }}' + '?id_post='+id_post);

		});
	});
</script>
@endpush
@endsection