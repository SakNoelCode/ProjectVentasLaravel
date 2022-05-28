<!---Directiva que te permite importar una vista--->
@extends('index')
@section('title','Clientes')
@section('h1_title','Registro de Clientes')

<!---Directiva que te permite crear una sección con su respectivo nombre--->
@section('content')

<div class="container w-100 border border-primary rounded p-4 mt-3">

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
    <h2 class="mt-4 mb-4 text-center">Tabla de Clientes</h2>
    <table class="table table-bordered border-primary">
        <thead>
            <tr class="table-primary">
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">DNI</th>
                <th scope="col">Dirección</th>
                <th scope="col" colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente->Name}}</td>
                <td>{{$cliente->Surname}}</td>
                <td>{{$cliente->DNI}}</td>
                <td>{{$cliente->Address}}</td>
                <td>

                    <form action="{{ route('clientes-show' , ['id' => $cliente->id] ) }}">
                        @csrf
                        <button class="btn btn-success btn-sm">Editar</button>
                    </form>
                </td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$cliente->id}}">
                        Eliminar
                    </button>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal-{{$cliente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Mensaje de confirmación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Seguro que eliminar un registro?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                            <form action="{{ route('clientes-destroy', [$cliente->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Confirmar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>

</div>

@endsection

@section('footer')
    
@endsection

@section('scripts')