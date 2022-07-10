@extends('index')
@section('title','Ventas')
@section('styles')
<!---DataTables CSS--->
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<!---Librería Mensajes emergentes--->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('h1_title','Ventas')
@section('content')

<!---Btn para crear--->
<div class="mb-3">
    <a href="{{route('ventas.create')}}"><button type="button" class="btn btn-primary"> Añadir nuevo Registro</button></a>
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

<!---Tabla Ventas--->
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Tabla de Ventas
    </div>

    <div class="card-body">
        <table id="table_example" class="table table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Número</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Cliente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                <tr>
                    <td>{{$venta->numero}}</td>
                    <td>{{$venta->fecha}}</td>
                    <td>{{$venta->total}}</td>
                    <td>{{$venta->nameClient}}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                            <!-- Button Mostrar -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="">Ver</button>
                            
                            <!-- Button Eliminar -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="">Eliminar</button>

                        </div>
                    </td>
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