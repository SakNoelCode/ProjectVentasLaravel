@extends('index')
@section('title','Actualizar-Producto')
@section('h1_title','Actualizar Producto')
@section('content')

<!---Formulario de Registro--->
<div class="container w-100 border border-primary rounded p-4 mt-3">
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

            <div class="col-md-6">
                <label for="inputCategory" class="form-label">Categoría:</label>
                <select name="category_id" id="inputCategory" class="form-select">
                    @foreach ($categorias as $category)

                    <!---Comparar para poder seleccionar la categoría del producto--->
                    @if ($producto -> categoria_id == $category ->id)
                    <option selected value="{{$category->id}}">{{ $category->name }}</option>
                    @else
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endif

                    @endforeach
                </select>
                <br>
                @error('category_id')
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
@section('footer')
    
@endsection

@section('scripts')