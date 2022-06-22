@extends('index')
@section('title','Actualizar Unidad de Medida')
@section('styles')
@endsection
@section('h1_title','Actualizar Unidad de Medida')
@section('content')

<!----Aqui va el contenido------>
<div class="container w-100 border border-primary rounded p-4 mt-3">
    <form action="{{ route ('unidadesMedidas.update',['unidadesMedida' => $unidadMedida->id] ) }}" method="POST">
        @method('PATCH')
        @csrf

        <div class="row g-3">

            <div class="col-md-9">
                <label for="inputMedida" class="form-label">Nombre:</label>
                <input type="text" name="unidadMedida" class="form-control" id="inputMedida" value="{{old('unidadMedida',$unidadMedida -> unidadMedida)}}">
                @error('unidadMedida')
                <small class="text-danger">{{'*'.$message }}</small>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="inputDescription" class="form-label">Descripción:</label>
                <textarea name="description" maxlength="80" class="form-control" id="inputDescription" rows="3">{{old('description',$unidadMedida -> descripcion)}}</textarea>
                @error('description')
                <small class="text-danger">{{'*'.$message }}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <div class="form-check form-switch">
                    @if ($unidadMedida->estado == 'ACTIVO')
                    <input name="cboEstado" class="form-check-input" type="checkbox" id="EstadoCheckChecked" checked>
                    <label class="form-check-label" for="EstadoCheckChecked">Estado</label>
                    @else
                    <input name="cboEstado" class="form-check-input" type="checkbox" id="EstadoCheckChecked">
                    <label class="form-check-label" for="EstadoCheckChecked">Estado</label>
                    @endif
                </div>
                <br>
            </div>

            <div class="col-12" style="text-align: center;">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{route('unidadesMedidas.index')}}"><button type="button" class="btn btn-secondary">Volver</button></a>
            </div>

        </div>

    </form>
</div>

@endsection

@section('footer')

@endsection

@section('scripts')