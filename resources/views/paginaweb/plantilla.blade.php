<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Asesorias</title>
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }} ">
	<link rel="stylesheet" href="{{ asset('css/normalize.css') }} ">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} ">
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="icon" href="{{ asset('/assets/img/favicon.png') }}" type="image/x-icon">

</head>
<body>
	<!--======================================== Boton ir arriba ========================================-->
	<i class="btn-up fa fa-arrow-circle-o-up hidden-xs"></i>
	<!--======================================== Navegación ========================================-->
	<header class="full-reset header">
		<!--======================================== Logo(Nombre INS) ========================================-->
		<div class="full-reset logo">
			<span class="hidden-lg hidden-md">AVU</span>
			<span class="hidden-xs hidden-sm">Asesorias Virtuales UTVT</span>
		</div>
		<!--======================================== Links de navegación ========================================-->
		<nav class="full-reset navigation">
			<ul class="full-reset list-unstyled">
				<li><a href="{{ route('inicioUsuario') }}">Inicio</a></li>
				@if(Session::get('sesionid') == "")
				<li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
				@else
				<li><a href="{{ route('cerrarSesion') }}">Cerrar Sesión</a></li>
				@endif
				@if(Session::get('sesiontipo') == 'Profesor')
				<li><a href="{{ route('registroGrupo') }}">Crear nuevo grupo</a></li>
				@endif
				<li><a href="#" class="btm-mega-menu">Más &nbsp;<i class="fa fa-caret-down"></i></a></li>
			</ul>
		</nav>
		<!--======================================== Mega menu ========================================-->
		<div class="full-reset mega-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<span class="full-reset titles">Pagina de la universidad</span>
						<ul class="list-unstyled full-reset">
							<li><a href="https://utvtol.org.mx/" class="open-link-newTab" style="text-decoration: none"><i class="fa fa-chevron-right"></i> UVTTOL</a></li>
						</ul>
					</div>
				</div>
			</div>
			<i class="fa fa-times-circle btm-mega-menu close-mega-menu fa-2x"></i>
		</div>
		<!--======================================== Boton menu mobil ========================================-->
		<a class=" hidden-sm hidden-md hidden-lg pull-right button-menu-mobile show-close-menu-m"><i class="fa fa-ellipsis-v"></i></a>
	</header>
	<!--======================================== Logo & Lema ========================================-->
	<!--<section class="full-reset font-cover" style="background-image: url(assets/img/font-index.jpg);">
		<div class="full-reset" style="height: 100%; background-color: rgba(255,255,255,.6); padding: 60px 0;">
			<h1 class="text-center titles">Lorem ipsum dolor sit amet</h1>
			<figure class="Logo-Ins-Index">
				<img src="assets/img/logo.png" alt="Logo" class="img-responsive">
			</figure>
			<p class="lead text-center">
				"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias repudiandae cumque dolorum mollitia tempora"
			</p>
		</div>
	</section>-->
	<div class="divider-general"></div>
	<div class="container">
		@yield('contenido')
	</div>
	<!--======================================== Video corto & carrusel========================================-->
	<!--<section class="full-reset" style="background-color: rgb(242, 242, 242); padding: 40px 0;">
		<div class="container">
			<h2 class="text-center titles">Instalaciones de la institución</h2>
			<br><br>
			-======================================== Carrusel ========================================--
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-sm-push-6">
					<h3 class="text-center titles">Fotos Instalaciones</h3>
					<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias repudiandae cumque dolorum mollitia tempora odit quam, rerum pariatur ipsa unde, delectus laborum aliquid voluptates, nihil sed iste minima quod doloribus.
					<a href="http://ins-sensunte.net/imagenes/espacio_ins/Flash01/index.html" class="open-link-newTab">Has click aqui para ver las fotos</a>
					</p>
					<i class="fa fa-picture-o icon-index hidden-xs hidden-sm"></i>
				</div>
				<div class="col-xs-12 col-sm-6 col-sm-pull-6">
					<div id="slider-ins" class="carousel slide" data-ride="carousel">
					  <-- Indicadores -
					  <ol class="carousel-indicators">
					    <li data-target="#slider-ins" data-slide-to="0" class="active"></li>
					    <li data-target="#slider-ins" data-slide-to="1"></li>
					    <li data-target="#slider-ins" data-slide-to="2"></li>
					  </ol>
					  <!- Imagenes --
					  <div class="carousel-inner" role="listbox">
						
						<!- Primera imagen --
					    <div class="item active">
					      <img src="assets/gallery/default.png" alt="Default">
					      <div class="carousel-caption">
					        Lorem ipsum dolor sit amet
					      </div>
					    </div>
					
						<!- Segunda imagen --
					    <div class="item">
					      <img src="assets/gallery/default.png" alt="Default">
					      <div class="carousel-caption">
					        Lorem ipsum dolor sit amet
					      </div>
					    </div>
					
						<!- Tercera imagen -
					    <div class="item">
					      <img src="assets/gallery/default.png" alt="Default">
					      <div class="carousel-caption">
					        Lorem ipsum dolor sit amet
					      </div>
					    </div>
					    
					  </div>

					  <!- Controles -
					  <a class="left carousel-control" href="#slider-ins" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#slider-ins" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
			</div>
			<br>
			<div class="divider-general"></div>
			<br>
			-======================================== Video ========================================-
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<h3 class="text-center titles">Video Instalaciones</h3>
					<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias repudiandae cumque dolorum mollitia tempora odit quam, rerum pariatur ipsa unde, delectus laborum aliquid voluptates, nihil sed iste minima quod doloribus.</p>
					<i class="fa fa-film icon-index hidden-xs hidden-sm"></i>
				</div>
				<div class="col-xs-12 col-sm-6">
					<video controls>
						<source src="assets/video/Introl.mp4" type="video/mp4">
					</video>
				</div>
			</div>
		</div>
	</section>-->
	<!--======================================== Acontecer institucional ========================================
	<section class="events-ins">
		<div class="container-fluid">
			<h2 class="text-center titles">ACONTECER INSTITUCIONAL</h2>
			<br><br>
			<div class="row">
				<!-======================================== Articulo 1 ========================================-
				<article class="col-xs-12 col-sm-6 col-md-4">
					<div class="thumbnail">
				      <img src="assets/gallery/default.png" alt="IMG" class="img-responsive img-rounded">
				      <div class="caption">
				        <h3 class="text-center">Lorem ipsum dolor sit amet</h3>
				        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis quam, incidunt, sapiente id quibusdam voluptatem.</p>
				        <p class="text-center"><a href="#" class="btn btn-primary" role="button">Ver imágenes</a></p>
				      </div>
				    </div>
				</article>
				<!-======================================== Articulo 2 ========================================-
				<article class="col-xs-12 col-sm-6 col-md-4">
					<div class="thumbnail">
				      <img src="assets/gallery/default.png" alt="IMG" class="img-responsive img-rounded">
				      <div class="caption">
				        <h3 class="text-center">Lorem ipsum dolor sit amet</h3>
				        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis quam, incidunt, sapiente id quibusdam voluptatem.</p>
				        <p class="text-center"><a href="#" class="btn btn-primary" role="button">Ver imágenes</a></p>
				      </div>
				    </div>
				</article
				<!-======================================== Articulo 3 ========================================-
				<article class="col-xs-12 col-sm-6 col-md-4">
					<div class="thumbnail">
				      <img src="assets/gallery/default.png" alt="IMG" class="img-responsive img-rounded">
				      <div class="caption">
				        <h3 class="text-center">Lorem ipsum dolor sit amet</h3>
				        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis quam, incidunt, sapiente id quibusdam voluptatem.</p>
				        <p class="text-center"><a href="#" class="btn btn-primary" role="button">Ver imágenes</a></p>
				      </div>
				    </div>
				</article>
			</div>
		</div>
	</section>-->
	<div class="divider-general"></div>
	<!--======================================== Enlaces importantes ========================================-->
	<section class="text-center important-links-index">
		<h2 class="titles">Sitios y enlaces importantes</h2>

		<a href="#!" class="open-link-newTab">
			<i class="fa fa-graduation-cap"></i>
			<p></p>
		</a>

		<a href="#!" class="open-link-newTab">
			<i class="fa fa-paw"></i>
			<p></p>
		</a>

		<a href="#!" class="open-link-newTab">
			<i class="fa fa-globe"></i>
			<p></p>
		</a>

		<a href="#!" class="open-link-newTab">
			<i class="fa fa-star-o"></i>
			<p></p>
		</a>

		<a href="#!" class="open-link-newTab">
			<i class="fa fa-file-text-o"></i>
			<p></p>
		</a>

		<a href="#!" class="open-link-newTab">
			<i class="fa fa-download"></i>
			<p></p>
		</a>
	</section>
	<!--======================================== Pie de pagina ========================================-->
	<footer class="full-reset footer">
		<div class="full-reset" style="padding: 15px 0;">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<h4 class="titles text-center">Visitenos en</h4>
						<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					</div>
					<div class="col-xs-12 col-sm-4">
						<h4 class="titles text-center">Contactenos</h4>
						<p class="text-center">Tele-Fax: +(000)0000-0000 <br>Correo Electrónico: correo@hotmail.com</p>
					</div>
					<div class="col-xs-12 col-sm-4">
						<h4 class="titles subtitles-footer">Siguenos en</h4>
						<ul class="list-unstyled links-footer">
							<li><a href="#!" class="open-link-newTab"><i class="fa fa-facebook"></i> &nbsp; Facebook</a></li>
							<li><a href="#!" class="open-link-newTab"><i class="fa fa-twitter"></i> &nbsp; Twitter</a></li>
							<li><a href="#!" class="open-link-newTab"><i class="fa fa-google-plus"></i> &nbsp; Google+</a></li>
						</ul>
					</div>
					<div class="col-xs-12">
						<div class="full-reset footer-copyright"><i class="fa fa-copyright"></i> 2019</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Scripts -->
	<script src="{{ asset('/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/js/jquery-3.4.1.js') }}"></script>
	<script src="{{ asset('/js/modernizr.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>	
	<script src="{{ asset('/js/main.js') }}"></script>	
	<script src="{{ asset('/js/main2.js') }}"></script>
	@stack('script')
</body>
</html>