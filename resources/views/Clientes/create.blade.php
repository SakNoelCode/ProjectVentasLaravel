@extends('index')
@section('title','Agregar Cliente')
@section('styles')
@endsection
@section('h1_title','Agregar Cliente')
@section('content')

<div class="container w-100 border border-primary rounded p-4 mt-3">

    <!---Se usará la ruta con el nombre clientes, que use el método POST--->
    <form action="{{route('clientes.store')}}" method="POST">
        <!---Esta directiva nos permite activar un token de seguridad, su uso es obligatorio en formularios--->
        @csrf

        <div class="row g-3">

            <div class="col-md-6">
                <label for="inputNames" class="form-label">Nombres</label>
                <input type="text" name="name" class="form-control" id="inputNames" value="{{old('name')}}">
                @error('name')
                <small  class="text-danger">{{'*'.$message }}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="inputSurnames" class="form-label">Apellidos</label>
                <input type="text" name="surname" class="form-control" id="inputSurnames" value="{{old('surname')}}">
                @error('surname')
                <small  class="text-danger">{{'*'.$message }}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="inputDni" class="form-label">DNI</label>
                <input type="text" name="dni" class="form-control" id="inputDni" value="{{old('dni')}}">
                @error('dni')
                <small  class="text-danger">{{'*'.$message }}</small>
                @enderror
            </div>

            <div class="col-12">
                <label for="inputAddress" class="form-label">Dirección</label>
                <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Jr. La verdad #123" value="{{old('address')}}">
                @error('address')
                <small  class="text-danger">{{'*'.$message }}</small>
                @enderror
            </div>

            <div class="col-12" style="text-align: center;">
                <button type="submit" class="btn btn-primary m-auto">Guardar</button>
                <a href="{{route('clientes.index')}}"><button type="button" class="btn btn-secondary">Volver</button></a>
            </div>

        </div>
    </form>
</div>
@endsection

@section('footer')
@endsection

@section('scripts')
@endsection