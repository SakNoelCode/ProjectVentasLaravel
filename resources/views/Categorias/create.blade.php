@extends('index')
@section('title','Agregar Categoría')
@section('styles')
<!---Librería Mensajes emergentes--->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('h1_title','Agregar categoría')
@section('content')

<div class="container w-100 border border-primary rounded p-4 mt-3">

    <form action="{{route('categorias.store')}}" method="POST">
        <!---Esta directiva nos permite activar un token de seguridad, su uso es obligatorio en formularios--->
        @csrf
        
        <!--Esta directiva nos comprobar si el envío del formulario ha sido exitoso-->
        @if (session('success'))
        <script>
            Swal.fire(
                'Registro exitoso',
                'Bien hecho',
                'success'
            )
        </script>
        @endif


        <div class="row g-3">

            <div class="col-md-9">
                <label for="inputNames" class="form-label">Nombre:</label>
                <input type="text" name="categoria" class="form-control" id="inputNames" value="{{old('categoria')}}">
                @error('categoria')
                <small  class="text-danger">{{'*'.$message }}</small>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="inputDescription" class="form-label">Descripción:</label>
                <textarea name="description" maxlength="80" class="form-control" id="inputDescription" rows="3">{{old('description')}}</textarea>
                @error('description')
                <small  class="text-danger">{{'*'.$message }}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <div class="form-check form-switch">
                    <input name="cboEstado" class="form-check-input" type="checkbox" id="EstadoCheckChecked" checked>
                    <label class="form-check-label" for="EstadoCheckChecked">Estado</label>
                </div>
                <br>
            </div>

            <div class="col-12" style="text-align: center;">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{route('categorias.index')}}"><button type="button" class="btn btn-secondary">Volver</button></a>
            </div>

        </div>
    </form>
</div>
@endsection

@section('footer')
@endsection

@section('scripts')
@endsection