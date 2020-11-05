<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
<center>
  <h2>Un Nuevo Usuario se ha registrado en tu grupo de Estudio</h2><br>
  <p class="text-justify font-weight-light">
  	El usuario {{ Session::get('sesionname') }} se ha unido a tu grupo de  {{ $categoria }}
  </p>
  <br>

</center>  	
</body>
</html>