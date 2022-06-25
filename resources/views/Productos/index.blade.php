@extends('index')
@section('title','Productos')
@section('styles')
<!---DataTables CSS--->
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<!---Librería Mensajes emergentes--->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('h1_title','Productos')

@section('content')

<!---Btn para crear--->
<div class="mb-3">
    <a href="{{route('productos.create')}}"><button type="button" class="btn btn-primary"> Añadir nuevo Registro</button></a>
</div>

<!---Modal de Exito--->
@if(session('success'))
<script>
    Swal.fire(
        'Operación exitosa',
        'Bien hecho',
        'success'
    )
</script>
@endif

<!---Modal de Error--->
@if(session('error'))
<script>
    Swal.fire(
        'Ups',
        'Ingrese datos válidos',
        'error'
    )
</script>
@endif

<!---Tabla Productos--->
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Tabla de Productos
    </div>

    <div class="card-body">
        <table id="table_example" class="table table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th>Unidad de Medida</th>
                    <th>Presentación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->cod_producto}}</td>
                    <td>{{$producto->name}}</td>
                    <td>{{$producto->amount}}</td>
                    <td>{{$producto->stock}}</td>
                    <td>
                        @foreach ($categorias as $categoria)
                        @if ($producto->categoria_id == $categoria->id )
                        {{$categoria->categoria}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($unidadesMedida as $unidadMedida)
                        @if ($producto->unidadMedida_id == $unidadMedida->id)
                        {{$unidadMedida->unidadMedida}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($presentaciones as $presentacion)
                        @if ($producto->presentacion_id == $presentacion->id)
                        {{$presentacion->presentacion}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                            <!-- Button Eliminar -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete-{{$producto->id}}">Eliminar</button>

                            <!-- Button Editar -->
                            <form action="{{route('productos.show',['id'=>$producto->id])}}">
                                @csrf
                                <button type="submit" class="btn btn-warning">Editar</button>
                            </form>

                            <!-- Button Mostrar -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalVer-{{$producto->id}}">Ver</button>

                            <!-- Button AddStock -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddStok-{{$producto->id}}"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </td>
                </tr>

                <!-- Modal Para Delete -->
                <div class="modal fade" id="modalDelete-{{$producto->id}}" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDeleteLabel">Mensaje de confirmación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Seguro que quiere eliminar un registro?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="{{ route('productos.destroy', [$producto->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Confirmar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Para Ver-->
                <div class="modal fade" id="modalVer-{{$producto->id}}" tabindex="-1" aria-labelledby="modalVerLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalVerLabel">Mostrando Producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">ID:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$producto->id}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Fecha Vencimiento:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$producto->fecha_vencimiento}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Descripción:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$producto->description}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Creado el:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$producto->created_at}}" disabled>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Para addStock -->
                <div class="modal fade" id="modalAddStok-{{$producto->id}}" tabindex="-1" aria-labelledby="modalAddStok" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAddStok">Añadir productos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('productos.addStock',['id'=>$producto->id])}}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">En stock:</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" value="{{$producto->stock}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="inputnewStock">Añadir</label>
                                        <div class="col-sm-8">
                                            <input type="number" min="1" step="1" name="newStock" id="inputnewStock" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection

@section('footer')
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

<!---JS Datable Js--->
<script>
    window.addEventListener('DOMContentLoaded', event => {
        const datatablesSimple = document.getElementById('table_example');
        if (datatablesSimple) {
            new simpleDatatables.DataTable(datatablesSimple);
        }
    });
</script>
@endsection