<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} ">
</head>
<body>
<center>
  <h2>Han comentado el Post: {{ $titulo }}</h2><br>
  <p class="text-justify font-weight-light">
  	El usuario {{ Session::get('sesionname') }} ha comentado un POST
  </p>
  <br>
  <p><a href="{{ URL::action('PostsController@postGrupo',['id_grupo'=>$idp]) }}" class="btn btn-info">
  Ir a Post</a></p>
</center>  	
</body>
</html>