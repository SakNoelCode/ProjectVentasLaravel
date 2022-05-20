@extends('layout')

@section('content')
<br>
<br>
<!---Encabezado--->
<div class="container">
    <h1 class="text-center">Actualizar Productos</h1>
</div>
<!---Formulario de Registro--->
<div class="container w-50 border border-primary rounded p-4 mt-3">
    <form action="{{ route('productos-update',['id' => $producto->id]) }}" method="POST">
        @method('PATCH')
        @csrf

        @if(session('success'))
        <div class="col-12">
            <h5 class="alert alert-success">{{session('success')}}</h5>
        </div>
        @endif

        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputName" class="form-label">Nombre</label>
                <input type="text" name="name" id="inputName" class="form-control" value="{{$producto->name}}">
                <br>
                @error('name')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="inputAmount" class="form-label">Precio</label>
                <input type="number" min="0" step="0.01" name="amount" id="inputAmount" class="form-control" value="{{ $producto->amount }}">
                <br>
                @error('amount')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>

            <div class="col-12">
                <label for="inputDescription" class="form-label">Descripción</label>
                <input type="text" name="description" id="inputDescription" class="form-control" value="{{ $producto->description }}">
                <br>
                @error('description')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection