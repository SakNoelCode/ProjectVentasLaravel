@extends('layout')

@section('content')
<br>
<br>
<!---Encabezado--->
<div class="container">
    <h1 class="text-center">Productos</h1>
</div>
<!---Formulario de Registro--->
<div class="container w-50 border border-primary rounded p-4 mt-3">
    <form action="{{ route('productos') }}" method="POST">
        @csrf

        @if(session('success'))
        <div class="col-12">
            <h5 class="alert alert-success">{{session('success')}}</h5>
        </div>
        @endif

        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputName" class="form-label">Nombre</label>
                <input type="text" name="name" id="inputName" class="form-control">
                <br>
                @error('name')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="inputAmount" class="form-label">Precio</label>
                <input type="number" min="0" step="0.01" name="amount" id="inputAmount" class="form-control">
                <br>
                @error('amount')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>

            <div class="col-12">
                <label for="inputDescription" class="form-label">Descripción</label>
                <input type="text" name="description" id="inputDescription" class="form-control">
                <br>
                @error('description')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>

    <!---Tabla Productos--->
    <h2 class="mt-4 mb-4 text-center">Tabla de Productos</h2>
    <table class="table table-bordered border-primary">
        <thead>
            <tr class="table-primary">
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col" colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>           
            @foreach ($productos as $producto)
            <tr>
                <td>{{$producto->name}}</td>
                <td>{{$producto->description}}</td>
                <td>{{$producto->amount}}</td>
                <td>
                    <form action="{{ route('productos-show',['id' => $producto->id]) }}">
                        @csrf
                        <button class="btn btn-success btn-sm">Editar</button>
                    </form>

                </td>
                <td>
                    <form action="{{ route('productos-destroy',['id' => $producto->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection