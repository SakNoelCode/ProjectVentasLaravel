
<!--Notas sobre Directivas
| @extends('')  Directiva que te permite importar una vista
| @section('')  Directiva que te permite crear una sección con su respectivo nombre
| @csrf         Esta directiva nos permite activar un token de seguridad, su uso es obligatorio en formularios
| 

--->

@extends('layout')


@section('content')
<br>
<br>

<div class="container">
  <h1>Clientes</h1>
</div>

<div class="container w-50 border border-primary p-4 mt-3">

  <!---Formulario Cliente--->

  <!---Se usará la ruta con el nombre clientes, que use el método POST--->
  <form action="{{route('clientes')}}" method="POST">
    @csrf
    <div class="row g-3">
      <div class="col-md-6">
        <label for="inputNames" class="form-label">Nombres</label>
        <input type="text" name="name" class="form-control" id="inputNames">
        @error('name')
        <h6 class="alert alert-danger"> {{ $message }} </h6>
        @enderror
      </div>
      <div class="col-md-6">
        <label for="inputSurnames" class="form-label">Apellidos</label>
        <input type="text" name="surname" class="form-control" id="inputSurnames">
      </div>
      <div class="col-md-6">
        <label for="inputDni" class="form-label">DNI</label>
        <input type="text" name="dni" class="form-control" id="inputDni">
      </div>

      <div class="col-12">
        <label for="inputAddress" class="form-label">Dirección</label>
        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Jr. La verdad #123">
      </div>

      <!--Esta directiva nos comprobar si el envío del formulario ha sido exitoso-->
      @if (session('success'))
      <div class="col-12">
        <h5 class="alert alert-success"> {{session('success')}} </h5>
      </div>
      @endif

      <div class="col-12">
        <button type="submit" class="btn btn-primary m-auto">Guardar</button>
      </div>
    </div>

  </form>

</div>

@endsection