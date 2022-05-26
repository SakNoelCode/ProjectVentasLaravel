<!---Directiva que te permite importar una vista--->
@extends('layout')
@section('title','Actualizar-cliente')
<!---Directiva que te permite crear una sección con su respectivo nombre--->
@section('content')


<br>
<br>

<div class="container">
    <h1 class="text-center">Actualizar Clientes</h1>
</div>

<div class="container w-50 border border-primary p-4 mt-3">

    <!---Formulario Cliente--->

    <!---Se usará la ruta con el nombre clientes, que use el método POST--->
    <form action="{{ route('clientes-update', ['id' => $Cliente -> id]) }}" method="POST">
        <!---Esta directiva nos permite activar un token de seguridad, su uso es obligatorio en formularios--->
        <!--Especificamos que nuestro método es de tipo PATCH-->
        @method('PATCH')
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputNames" class="form-label">Nombres</label>
                <input type="text" name="name" class="form-control" id="inputNames" value="{{$Cliente -> Name}}">
                <!---Directiva que detecta inconistencias en la entrada del dato las condiciones se encuentran en el controlador--->
                <br>
                @error('name')
                <h6 class="alert alert-danger"> {{ $message }} </h6>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputSurnames" class="form-label">Apellidos</label>
                <input type="text" name="surname" class="form-control" id="inputSurnames" value="{{$Cliente -> Surname}}">
                <br>
                @error('surname')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputDni" class="form-label">DNI</label>
                <input type="text" name="dni" class="form-control" id="inputDni" value="{{$Cliente -> DNI}}">
                <br>
                @error('dni')
                <h6 class="alert alert-danger"> {{$message}} </h6>
                @enderror
            </div>

            <div class="col-12">
                <label for="inputAddress" class="form-label">Dirección</label>
                <input type="text" name="address" class="form-control" id="inputAddress" value="{{$Cliente -> Address}}">
                <br>
                @error('address')
                <h6 class="alert alert-danger"> {{$message}} </h6>
                @enderror
            </div>

            <!--Esta directiva nos comprobar si el envío del formulario ha sido exitoso-->
            @if (session('success'))
            <div class="col-12">
                <h5 class="alert alert-success"> {{session('success')}} </h5>
            </div>
            @endif

            <!---Botón Submit Guardar --->
            <div class="col-12">
                <button type="submit" class="btn btn-primary m-auto">Actualizar</button>
            </div>
        </div>

    </form>

</div>


@endsection