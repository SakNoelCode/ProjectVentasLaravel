@extends('index')
@section('title','Categorias')
@section('h1_title','Registro de Categorias')
@section('content')
<div class="container w-100 border border-primary rounded p-4 mt-3">

    <form action="{{route('categorias.store')}}" method="POST">
        <!---Esta directiva nos permite activar un token de seguridad, su uso es obligatorio en formularios--->
        @csrf

        <!--Esta directiva nos comprobar si el envío del formulario ha sido exitoso-->
        @if (session('success'))
        <div class="col-12">
            <h5 class="alert alert-success"> {{session('success')}} </h5>
        </div>
        @endif

        <div class="row g-3">
            <div class="col-md-12">
                <label for="inputNames" class="form-label">Nombre:</label>
                <input type="text" name="name" class="form-control" id="inputNames">
                <!---Directiva que detecta inconistencias en la entrada del dato 
                 las condiciones se encuentran en el controlador--->
                <br>
                @error('name')
                <h6 class="alert alert-danger"> {{ $message }} </h6>
                @enderror
            </div>

            <!---Botón Submit Guardar --->
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>

    <!---Tabla Categorías--->
    <h2 class="mt-4 mb-4 text-center">Tabla de Categorías</h2>
    <table class="table table-bordered border-primary">
        <thead>
            <tr class="table-primary">
                <th class="text-center" scope="col">Nombre</th>
                <th class="text-center" scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <!--Se asigna esta variable en el ProductoController--->
            @foreach ($categorias as $categoria)
            <tr>
                <td class="text-center">{{$categoria->name}}</td>
                <td class="text-center">
                    <form action="{{ route ('categorias.show',['categoria' => $categoria->id] ) }}">
                        @csrf
                            <button class="btn btn-primary" type="submit">Editar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('footer')
    
@endsection

@section('scripts')