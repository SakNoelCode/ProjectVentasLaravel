<!---Directiva que te permite importar una vista--->
@extends('index')
@section('title','Actualizar-cliente')
@section('styles')
@endsection
@section('h1_title','Actualizar Cliente')
<!---Directiva que te permite crear una sección con su respectivo nombre--->
@section('content')

<div class="container w-100 border border-primary p-4 mt-3">

    <!---Formulario Cliente--->

    <!---Se usará la ruta con el nombre clientes, que use el método POST--->
    <form action="{{ route('clientes.update', ['id' => $Cliente -> id]) }}" method="POST">
        <!---Esta directiva nos permite activar un token de seguridad, su uso es obligatorio en formularios--->
        <!--Especificamos que nuestro método es de tipo PATCH-->
        @method('PATCH')
        @csrf

        <div class="row g-3">

            <div class="col-md-6">
                <label for="inputNames" class="form-label">Nombres</label>
                <input type="text" name="name" class="form-control" id="inputNames" value="{{old('name',$Cliente -> Name)}}">
                @error('name')
                <small class="text-danger">{{'*'.$message }}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="inputSurnames" class="form-label">Apellidos</label>
                <input type="text" name="surname" class="form-control" id="inputSurnames" value="{{old('surname',$Cliente -> Surname)}}">
                @error('surname')
                <small class="text-danger">{{'*'.$message }}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="inputDni" class="form-label">DNI</label>
                <input type="text" name="dni" class="form-control" id="inputDni" value="{{old('dni',$Cliente -> DNI)}}">
                @error('dni')
                <small class="text-danger">{{'*'.$message }}</small>
                @enderror
            </div>

            <div class="col-12">
                <label for="inputAddress" class="form-label">Dirección</label>
                <input type="text" name="address" class="form-control" id="inputAddress" value="{{old('address',$Cliente -> Address)}}">
                @error('address')
                <small class="text-danger">{{'*'.$message }}</small>
                @enderror
            </div>

            <!---Botón Submit Guardar --->
            <div class="col-12" style="text-align: center;">
                <button type="submit" class="btn btn-primary">Actualizar</button>
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