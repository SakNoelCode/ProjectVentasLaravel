<!---Directiva que te permite importar una vista--->
@extends('layout')

<!---Directiva que te permite crear una sección con su respectivo nombre--->
@section('content')


<br>
<br>

<div class="container">
    <h1 class="text-center">Clientes</h1>
</div>

<div class="container w-50 border border-primary p-4 mt-3">

    <!---Formulario Cliente--->

    <!---Se usará la ruta con el nombre clientes, que use el método POST--->
    <form action="{{route('clientes')}}" method="POST">
        <!---Esta directiva nos permite activar un token de seguridad, su uso es obligatorio en formularios--->
        @csrf

        <!--Esta directiva nos comprobar si el envío del formulario ha sido exitoso-->
        @if (session('success'))
        <div class="col-12">
            <h5 class="alert alert-success"> {{session('success')}} </h5>
        </div>
        @endif

        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputNames" class="form-label">Nombres</label>
                <input type="text" name="name" class="form-control" id="inputNames">
                <!---Directiva que detecta inconistencias en la entrada del dato
        las condiciones se encuentran en el controlador--->
                <br>
                @error('name')
                <h6 class="alert alert-danger"> {{ $message }} </h6>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputSurnames" class="form-label">Apellidos</label>
                <input type="text" name="surname" class="form-control" id="inputSurnames">
                <br>
                @error('surname')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputDni" class="form-label">DNI</label>
                <input type="text" name="dni" class="form-control" id="inputDni">
                <br>
                @error('dni')
                <h6 class="alert alert-danger"> {{$message}} </h6>
                @enderror
            </div>

            <div class="col-12">
                <label for="inputAddress" class="form-label">Dirección</label>
                <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Jr. La verdad #123">
                <br>
                @error('address')
                <h6 class="alert alert-danger"> {{$message}} </h6>
                @enderror
            </div>



            <!---Botón Submit Guardar --->
            <div class="col-12">
                <button type="submit" class="btn btn-primary m-auto">Guardar</button>
            </div>
        </div>

    </form>


    <!---TABLA QUE MOSTRARA LOS REGISTROS DE CLIENTE--->
    <h2 class="mt-4 mb-3 text-center">Tabla de Registro:</h2>
    <div>
        <!---Encabezado de la tabla--->
        <div class="row">
            <div class="col-md-2 d-flex align-items-center">
                <p><b>Nombres</b></p>
            </div>
            <div class="col-md-2 d-flex align-items-center">
                <p><b>Apellidos</b></p>
            </div>
            <div class="col-md-2 d-flex align-items-center">
                <p> <b>DNI</b></p>
            </div>
            <div class="col-md-3 d-flex align-items-center">
                <p><b>Dirección</b></p>
            </div>
            <div class="col-md-3 d-flex justify-content-end">
                <p><b>Opciones</b></p>
            </div>
        </div>

        <!---Recorrer cada elemento de la variable Clientes con  un Foreach--->
        @foreach ($clientes as $cliente)
        <div class="row py-1">
            <!---Primer campo de la tabla, se debe llamar a los datos según están en la base de datos--->
            <div class="col-md-2 d-flex align-items-center">
                <a href="{{ route('clientes-show' , ['id' => $cliente->id] ) }}"> {{ $cliente->Name }} </a>
            </div>

            <!---Segundo campo de la tabla, se debe llamar a los datos según están en la base de datos--->
            <div class="col-md-2 d-flex align-items-center">
                <p>{{$cliente->Surname}}</p>
            </div>

            <!---Tercer campo de la tabla, se debe llamar a los datos según están en la base de datos--->
            <div class="col-md-2 d-flex align-items-center">
                <p>{{$cliente->DNI}}</p>
            </div>

            <!---Cuarto campo de la tabla, se debe llamar a los datos según están en la base de datos--->
            <div class="col-md-3 d-flex align-items-center">
                <p>{{$cliente->Address}}</p>
            </div>

            <div class="col-md-3 d-flex justify-content-end">
                <!---último campo de la tabla, se mostará un boton donde se podrá eliminar el registro--->
                <form action="{{ route('clientes-destroy', [$cliente->id]) }}" method="POST">
                    <!--Especificamos que nuestro método es de tipo DELETE-->
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

</div>


@endsection