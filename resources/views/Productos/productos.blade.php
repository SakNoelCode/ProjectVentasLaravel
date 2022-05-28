@extends('index')

@section('title','Productos')
@section('h1_title','Registro de Productos')

@section('content')

<!---Formulario de Registro--->
<div class="container w-100 border border-primary rounded p-4 mt-3">
    <form action="{{ route('productos') }}" method="POST">
        @csrf

        @if(session('success'))
        <div class="col-12">
            <h5 class="alert alert-success">{{session('success')}}</h5>
        </div>
        @endif

        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputName" class="form-label">Nombre</label>
                <input type="text" name="name" id="inputName" class="form-control">
                <br>
                @error('name')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="inputAmount" class="form-label">Precio</label>
                <input type="number" min="0" step="0.01" name="amount" id="inputAmount" class="form-control">
                <br>
                @error('amount')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="inputCategory" class="form-label">Categoría:</label>
                <select name="category_id" id="inputCategory" class="form-select">
                    @foreach ($categorias as $category)
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <br>
                @error('category_id')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>

            <div class="col-12">
                <label for="inputDescription" class="form-label">Descripción</label>
                <input type="text" name="description" id="inputDescription" class="form-control">
                <br>
                @error('description')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>

    <!---Tabla Productos--->
    <h2 class="mt-4 mb-4 text-center">Tabla de Productos</h2>
    <table class="table table-bordered border-primary">
        <thead>
            <tr class="table-primary">
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Categoría</th>
                <th scope="col" colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)

            <tr>
                <td>{{$producto->name}}</td>
                <td>{{$producto->description}}</td>
                <td>{{$producto->amount}}</td>
                <td>
                    @foreach ($categorias as $category)
                    @if ($producto -> categoria_id == $category ->id)
                    {{$category->name}}
                    @endif
                    @endforeach
                </td>
                <td>
                    <form action="{{ route('productos-show',['id' => $producto->id]) }}">
                        @csrf
                        <button class="btn btn-success btn-sm">Editar</button>
                    </form>

                </td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$producto->id}}">
                        Eliminar
                    </button>

                    <!--button type="button" class="btn btn-danger btn-sm" data-bs-toogle="modal" data-bs-target="#modal-{{$producto->id}}">Eliminar</button-->

                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal-{{$producto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Mensaje de confirmación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Seguro que eliminar un registro?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                            <form action="{{ route('productos-destroy',['id' => $producto->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Confirmar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </tbody>
    </table>

</div>

@endsection

@section('footer')
    
@endsection

@section('scripts')