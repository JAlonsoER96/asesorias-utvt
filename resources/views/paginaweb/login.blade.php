<!DOCTYPE html>
<html lang="es">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="icon" href="{{ asset('/assets/img/favicon.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{asset('/css/main.css')}}">
</head>
<body class="cover" style="background-image: url({{ asset('/assets/img/fondo-login.jpg') }});">
  <form action = "{{ route('session') }}" method="POST" enctype="multipart/form-data" autocomplete="off" class="full-box logInForm">
    {{csrf_field()}}

      <p class="text-center text-muted text-uppercase"><i>Asesorias Virtuales UTVT</i></p>
    <p class="text-center text-muted text-uppercase">Inicia sesión</p>
    @if($errors->first('email')) 
      <i> {{ $errors->first('email') }} </i> 
    @endif
    <div class="form-group label-floating">
      <label class="control-label">Correo</label>
      <input class="form-control" name="email" type="text" value="{{ old('email') }}" style="color: white;">
    </div>
    @if($errors->first('contrasena')) 
      <i> {{ $errors->first('contrasena') }} </i> 
    @endif
    <div class="form-group label-floating">
      <label class="control-label" >Contraseña</label>
      <input class="form-control" name="contrasena" type="password" alt="Contraseña" style="color: white;">
    </div>
    <div class="form-group text-center">
      <input type="submit" value="Iniciar sesión" class="btn btn-raised btn-danger">
    </div>
    <center><a href="{{ route('registro') }}"><img height="50" width="50" src="{{asset('assets/img/home-icon.png')}}" alt="Home Page"></a></center>
  </form>
    @if(Session::has('error'))
    <script type="text/javascript">
      alert("{{Session::get('error')}}")
    </script>
    @endif
  <!--====== Scripts -->
  <script src="{{asset('/js/jquery-3.4.1.js') }}"></script>
  <script src="{{asset('/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/js/material.min.js')}}"></script>
  <script src="{{asset('/js/ripples.min.js')}}"></script>
  <script src="{{asset('/js/sweetalert2.min.js')}}"></script>
  <script src="{{asset('/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
  <script src="{{asset('/js/main.js')}}"></script>
  <script>
    $.material.init();
  </script>
</body>
</html>