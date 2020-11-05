<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} ">
</head>
<body>
<center>
  <h2>Nuevo Post: </h2><br>
  <p class="text-justify font-weight-light">
  	El usuario {{ Session::get('sesionname') }} ha realizado un post en un grupo al que perteneces
  	<div class="col-md-12 col-lg-12 col-sm-8 col-xs-4">
  		<label class="control-label label-floating">Descripción</label><br>
  		<textarea class="form-control" cols="30" rows="10" readonly>{{ $cp }}</textarea>
  	</div>
  </p>
  <br>

</center>  	
</body>
</html>