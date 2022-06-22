@extends('index')
@section('title','Presentaciones')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection
@section('h1_title','Buscar Presentaciones')
@section('content')




<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Tabla de Presentaciones
    </div>
    <div class="card-body">
        <table id="table_example" class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($presentaciones as $presentacion)
                <tr>
                    <td>{{$presentacion->presentacion}}</td>
                    <td>{{$presentacion->descripcion}}</td>
                    <td>{{$presentacion->estado}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>





@endsection

@section('footer')
@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table_example').DataTable({
            "language": {
                "lengthMenu": "_MENU_ registros por página",
                "zeroRecords": "No se encontrarón resultados",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrando de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
        });
    });
</script>
@endsection