@extends('index')
@section('title','Presentaciones')
@section('styles')
<!---DataTables CSS--->
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<!---Librería Mensajes emergentes--->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('h1_title','Presentaciones')
@section('content')

<!---Btn para crear--->
<div class="mb-3">
    <a href="{{route('presentaciones.create')}}"><button type="button" class="btn btn-primary"> Añadir nuevo Registro</button></a>
</div>

<!---Modal de Exito--->
@if(session('success'))
<script>
    Swal.fire(
        'Registro actualizado',
        'Bien hecho',
        'success'
    )
</script>
@endif

<!---Tabla--->
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Tabla de Presentaciones
    </div>
    <div class="card-body">
        <table id="table_example" class="table table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($presentaciones as $presentacion)
                <tr>
                    <td>{{$presentacion->presentacion}}</td>
                    <td>{{$presentacion->descripcion}}</td>
                    <td>{{$presentacion->estado}}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <!--button type="button" class="btn btn-danger">Eliminar</button-->

                            <form action="{{route('presentaciones.show',['presentacione'=>$presentacion->id])}}">
                                @csrf
                                <button type="submit" class="btn btn-warning">Editar</button>
                            </form>

                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$presentacion->id}}">Ver</button>
                        </div>
                    </td>
                </tr>

                <!-- Modal Para Ver-->
                <div class="modal fade" id="exampleModal-{{$presentacion->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mostrando Presentación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">ID:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$presentacion->id}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Nombre:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$presentacion->presentacion}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Descripción:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$presentacion->descripcion}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Estado:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$presentacion->estado}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Fecha de creación:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$presentacion->created_at}}" disabled>
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