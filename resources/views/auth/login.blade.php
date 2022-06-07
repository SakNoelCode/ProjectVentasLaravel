<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!----Importación para BootStrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!----Importación para Font Awesome CSS-->
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

  <title>Inicio de sesión</title>
</head>

<body>
  <br>
  <br>
  <div class="container mt-5">
    <h1 class="text-center">Iniciar Sesión</h1>
  </div>


  <div class="container container w-25 border border-primary rounded p-4 mt-4">
    <form action="{{route('login')}}" method="POST">
      @csrf
      <!---Incluir la plantilla para mensajes de error---->
      @include('partials.messages')

      <div class="mb-3">
        <label for="exampleInputName" class="form-label">Nombre de Usuario</label>
        <input type="text" name="name" class="form-control" id="exampleInputName">
      </div>
      <div class="mb-3">
        <label for="txtPassword" class="form-label">Contraseña</label>
        <div class="input-group">
          <input ID="txtPassword" type="Password" Class="form-control" name="password">
          <div class="input-group-append">
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
  </div>

  <br>
  <br>
  <!---Importación JavaScript Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <!---Importación JavaScript JQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!---JavaScript para mostrar/ocultar Pass--->
  <script src="{{ asset('js/password.js') }}" type="text/javascript"></script>
</body>

</html>