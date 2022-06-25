@extends('index')
@section('title','Actualizar categoria')
@section('styles')
@endsection
@section('h1_title','Actualizar categoria')
@section('content')

<div class="container w-100 border border-primary rounded p-4 mt-3">
    <form action="{{route('categorias.update',['categoria'=>$categoria->id])}}" method="POST">
        @method('PATCH')
        <!---Esta directiva nos permite activar un token de seguridad, su uso es obligatorio en formularios--->
        @csrf

        <div class="row g-3">

            <div class="col-md-9">
                <label for="inputNames" class="form-label">Nombre:</label>
                <input type="text" name="categoria" class="form-control" id="inputNames" value="{{old('categoria',$categoria->categoria)}}">
                @error('categoria')
                <small  class="text-danger">{{'*'.$message }}</small>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="inputDescription" class="form-label">Descripción:</label>
                <textarea name="description" maxlength="80" class="form-control" id="inputDescription" rows="3" >{{old('description',$categoria->descripcion)}}</textarea>
                @error('description')
                <small  class="text-danger">{{'*'.$message }}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <div class="form-check form-switch">
                    @if ($categoria->estado == 'ACTIVO')
                    <input name="cboEstado" class="form-check-input" type="checkbox" id="EstadoCheckChecked" checked>
                    <label class="form-check-label" for="EstadoCheckChecked">Estado</label>
                    @else
                    <input name="cboEstado" class="form-check-input" type="checkbox" id="EstadoCheckChecked">
                    <label class="form-check-label" for="EstadoCheckChecked">Estado</label>
                    @endif
                </div>
            </div>

            <!---Botón Submit Guardar --->
            <div class="col-12" style="text-align:center ">
                <button type="submit" class="btn btn-primary">Actualizar</button>
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