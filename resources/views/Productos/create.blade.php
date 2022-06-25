@extends('index')
@section('title','Agregar Producto')
@section('styles')
<!---Librería Mensajes emergentes--->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('h1_title','Agregar Producto')
@section('content')

<!---Formulario de Registro--->
<div class="container w-100 border border-primary rounded p-4 mt-3">
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

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

            <div class="col-md-6 mb-3">
                <label for="inputcodigo" class="form-label">Código:</label>
                <input type="text" name="cod_producto" id="inputcodigo" class="form-control" value="{{old('cod_producto')}}">
                @error('cod_producto')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="inputName" class="form-label">Nombre:</label>
                <input type="text" name="name" id="inputName" class="form-control" value="{{old('name')}}">
                @error('name')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="inputAmount" class="form-label">Precio:</label>
                <input type="number" min="0" step="0.1" name="amount" id="inputAmount" class="form-control" value="{{old('amount')}}">
                @error('amount')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="inputfecha" class="form-label">Fecha de Vencimiento(Opcional):</label>
                <input type="date" name="fecha" id="inputfecha" class="form-control" value="{{old('fecha')}}">
                @error('fecha')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label for="inputCategory" class="form-label">Categoría:</label>
                <select name="category_id" id="inputCategory" class="form-select" >
                    @foreach ($categorias as $category)
                    <option value="{{$category->id}}">{{ $category->categoria}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label for="inputUnidadmedida" class="form-label">Unidad de Medida:</label>
                <select name="unidadmedida_id" id="inputUnidadmedida" class="form-select">
                    @foreach ($unidadesMedida as $unidadMedida)
                    <option value="{{$unidadMedida->id}}">{{$unidadMedida->unidadMedida}}</option>
                    @endforeach
                </select>
                @error('unidadmedida_id')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label for="inputpresentacion" class="form-label">Presentación:</label>
                <select name="presentacion_id" id="inputpresentacion" class="form-select">
                    @foreach ($presentaciones as $presentacion)
                    <option value="{{$presentacion->id}}">{{$presentacion->presentacion}}</option>
                    @endforeach
                </select>
                @error('presentacion_id')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label for="inputstock" class="form-label">Stock:</label>
                <input type="number" name="stock" id="inputstock" class="form-control" value="{{old('stock')}}">
                @error('stock')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
            </div>

            <div class="col-12 mb-2">
                <label for="inputDescription" class="form-label">Descripción:</label>
                <textarea name="description" maxlength="80" class="form-control" id="inputDescription" rows="3">{{old('description')}}</textarea>
                @error('description')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
            </div>

            <div class="col-12" style="text-align: center;">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{route('productos.index')}}"><button type="button" class="btn btn-secondary">Volver</button></a>
            </div>
        </div>
    </form>
</div>

@endsection

@section('footer')
@endsection

@section('scripts')
@endsection