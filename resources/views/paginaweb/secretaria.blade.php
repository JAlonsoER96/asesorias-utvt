@extends('paginaweb.plantilla')
@section('contenido')
<!--======================================== contenido de la pagina ========================================-->
	<section class="full-reset" style="min-height: 850px;">
		<div class="jumbotron">
		  <h2 class="text-center titles">Matricula</h2>
		  <p class="text-center lead">
		  	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio adipisci doloribus, amet eaque perspiciatis ut culpa quidem accusantium unde velit explicabo doloremque cupiditate! Facere quibusdam, deleniti molestias magni excepturi voluptas!
		  </p>
		</div>
		<!--======================================== Info. ========================================-->
		<article>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h3 class="text-center titles">
							Opción de bachiller
						</h3>
						<br><br>
						<h4 class="titles">Requisitos indispensables:</h4>
						<br>
						<p class="lead">
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
						</p>
					</div>
				</div>
			</div>
		</article>
		<div class="divider-general"></div>
		<!--======================================== Info. ========================================-->
		<article>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h3 class="text-center titles">
							Opción de bachiller
						</h3>
						<br><br>
						<h4 class="titles">Requisitos indispensables:</h4>
						<br>
						<p class="lead">
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
						</p>
					</div>
				</div>
			</div>
		</article>
		<div class="divider-general"></div>
		<!--======================================== Info. ========================================-->
		<article>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h3 class="text-center titles">
							Opción de bachiller
						</h3>
						<br><br>
						<h4 class="titles">Requisitos indispensables:</h4>
						<br>
						<p class="lead">
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
						</p>
					</div>
				</div>
			</div>
		</article>
		<!--======================================== Info. generalidades ========================================-->
		<article class="well" style="margin-bottom: 0 !important;">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h3 class="text-center titles">
							Consideraciones Generales
						</h3>
						<br><br>
						<p class="lead">
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
						</p>
					</div>
				</div>
			</div>
		</article>
	</section>
@push('script')
<script>
	$(document).ready(function(){
		var num = 2;
		var num2 = 3;
		var suma = num+num2;
		console.log(suma);
		alert(suma);	
	});
</script>
@endpush
@stop