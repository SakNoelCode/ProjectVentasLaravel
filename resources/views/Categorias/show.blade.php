@extends('index')
@section('title','Actualizar-categoria')
@section('h1_title','Actualizar-categoria')
@section('content')
<div class="container w-100 border border-primary rounded p-4 mt-3">

    <form action="{{route('categorias.update',['categoria'=>$categoria->id])}}" method="POST">
        @method('PATCH')
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
                <input type="text" name="name" class="form-control" id="inputNames" value="{{ $categoria->name }}">
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
</div>
@endsection

@section('footer')
    
@endsection

@section('scripts')