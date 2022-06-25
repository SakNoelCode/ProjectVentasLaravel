<!---Directiva que te permite importar una vista--->
@extends('index')
@section('title','Clientes')
@section('styles')
<!---DataTables CSS--->
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<!---Librería Mensajes emergentes--->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('h1_title','Clientes')

<!---Directiva que te permite crear una sección con su respectivo nombre--->
@section('content')

<!---Btn para crear--->
<div class="mb-3">
    <a href="{{route('clientes.create')}}"><button type="button" class="btn btn-primary"> Añadir nuevo Registro</button></a>
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

<!---Tabla Clientes--->
<div class="card mb-4">

    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Tabla de Clientes
    </div>

    <div class="card-body">
        <table id="table_example" class="table table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{$cliente->Name}}</td>
                    <td>{{$cliente->Surname}}</td>
                    <td>{{$cliente->DNI}}</td>
                    <td>{{$cliente->Address}}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                            <!-- Button Eliminar -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete-{{$cliente->id}}">Eliminar</button>
                            
                            <!-- Button Editar -->
                            <form action="{{route('clientes.show',['id'=>$cliente->id])}}">
                                @csrf
                                <button type="submit" class="btn btn-warning">Editar</button>
                            </form>
                            
                            <!-- Button Mostrar -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalVer-{{$cliente->id}}">Ver</button>
                        </div>
                    </td>
                </tr>

                <!-- Modal Para Delete -->
                <div class="modal fade" id="modalDelete-{{$cliente->id}}" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
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
                                <form action="{{ route('clientes.destroy', [$cliente->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Confirmar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Para Ver-->
                <div class="modal fade" id="modalVer-{{$cliente->id}}" tabindex="-1" aria-labelledby="modalVerLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalVerLabel">Mostrando Cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">ID:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$cliente->id}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Nombres:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$cliente->Name}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Apellidos:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$cliente->Surname}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">DNI:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$cliente->DNI}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Dirección:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$cliente->Address}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Creado el:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$cliente->created_at}}" disabled>
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