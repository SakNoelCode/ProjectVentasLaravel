@extends('index')
@section('title','Unidades-Medida')
@section('h1_title','Unidades de Medida')
@section('content')


<div class="container w-100 border border-primary rounded p-4 mt-3">
    <form action="{{route('unidadesMedidas.store')}}" method="POST">
        @csrf
        @if (session('success'))
        <div class="col-12">
            <h5 class="alert alert-success">{{session('success')}}</h5>
        </div>
        @endif

        <div class="row g-3">
            <div class="col-md-9">
                <label for="inputMedida" class="form-label">Nombre:</label>
                <input type="text" name="unidadMedida" class="form-control" id="inputMedida">
                <br>
                @error('unidadMedida')
                <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="inputDescription" class="form-label">Descripción:</label>
                <textarea name="description" maxlength="80" class="form-control" id="inputDescription" rows="3"></textarea>
                <br>
                @error('description')
                <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
            </div>

            <div class="col-md-6">
                <div class="form-check form-switch">
                    <input name="cboEstado" class="form-check-input" type="checkbox" id="EstadoCheckChecked" checked>
                    <label class="form-check-label" for="EstadoCheckChecked">Estado</label>
                </div>
                <br>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </div>

    </form>


    <!---Tabla Unidades-Medidas--->
    <h2 class="mt-4 mb-4 text-center">Tabla de Unidades de Medida</h2>
    <table class="table table-bordered border-primary">
        <thead>
            <tr class="table-primary">
                <th class="text-center" scope="col">Nombre</th>
                <th class="text-center" scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unidadesMedidas as $unidadMedida)
            <tr>
                <td class="text-center">{{$unidadMedida->unidadMedida}}</td>
                <td class="text-center">
                    <form action="{{ route ('unidadesMedidas.show',['unidadesMedida' => $unidadMedida->id] ) }}" >
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