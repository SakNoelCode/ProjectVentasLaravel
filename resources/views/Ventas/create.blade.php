@extends('index')
@section('title','Realizar venta')
@section('styles')
<!--Librería que nos permite hacer busquedas con select https://developer.snapappointments.com/bootstrap-select/-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
<!---Librería Mensajes emergentes--->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('h1_title','Realizar nueva venta')
@section('content')

<!---Formulario de Registro--->
<div class="container w-100 border border-primary rounded p-4 mt-3">
    <form action="{{route('ventas.store')}}" method="POST">
        @csrf

        <div class="row g-3">

            <div class="col-md-6 mb-3">
                <label for="inputnumero" class="form-label">Número:</label>
                <input type="text" name="numero" id="inputnumero" class="form-control" value="{{old('numero')}}">
                @error('numero')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
            </div>

            <!--div class="col-md-6 mb-3">
                <label for="inputTotal" class="form-label">Total:</label>
                <input type="number" name="total" id="inputTotal" class="form-control" disabled>
                @error('total')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
            </div---->

            <div class="col-md-6 mb-3">
                <label for="inputcliente" class="form-label">Cliente:</label>
                <select name="cliente_id" id="inputcliente" class="form-control selectpicker" data-live-search="true" title="Seleciona un cliente">
                    @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->Name}}</option>
                    @endforeach
                </select>
                @error('cliente_id')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
            </div>

            <div class="col-md-6 mb-3">
                <label for="inputproducto" class="form-label">Producto:</label>
                <select name="pidproducto" id="inputproducto" class="form-control selectpicker" data-live-search="true" title="Selecciona un producto">
                    @foreach ($productos as $producto)
                    <option value="{{$producto->id}}_{{$producto->stock}}_{{$producto->amount}}">
                        {{$producto->producto}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
            </div>

            <div class="col-md-4 mb-3">
                <label for="inputcantidad" class="form-label">Cantidad:</label>
                <input type="number" min="0" name="" id="inputcantidad" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label for="inputstock" class="form-label">En stock:</label>
                <input type="number" name="" id="inputstock" class="form-control" disabled placeholder="stock.....">
            </div>

            <div class="col-md-4 mb-3">
                <label for="inputPrecio" class="form-label">Precio:</label>
                <input type="number" name="" id="inputprecio" class="form-control" disabled placeholder="precio.....">
            </div>

            <!--botón agregar--->
            <div class="col-md-6 mb-3">
                <button type="button" id="btn-add" class="btn btn-success">Agregar</button>
            </div>

            <div class="col-md-12">

                <!--Tabla detalle--->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabla de Registros
                    </div>
                    <div class="card-body">
                        <table id="table_registros" class="table table-striped table-bordered table-hover">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Opciones</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <th colspan="4">Total:</th>
                                <th>
                                    <h5 id="total">$/ 00.0</h5>
                                    <input type="hidden" name="total_venta" id="total_venta">
                                </th>
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="col-12" style="text-align: center;">
                <input type="hidden" name="token" value="{{csrf_token()}}">
                <button id="btnGuardar" type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{route('ventas.index')}}"><button type="button" class="btn btn-secondary">Volver</button></a>
            </div>

        </div>
    </form>
</div>

@endsection

@section('footer')
@endsection


@section('scripts')
<!--Librería Jquery--->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!--Librería que nos permite hacer busquedas con select-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js" type="text/javascript"></script>

<script>
    //Variables principales
    let total = 0;
    let cont = 0;
    let subtotal = [];

    //Evaluar ni bien se carga la página
    evaluar();

    //Tener a la escuha el clic en el botón agregar
    $(document).ready(function() {
        $('#btn-add').click(function() {
            agregar();
        });
    });

    //Cargar los valores cada vez que seleccionemos un producto
    $('#inputproducto').change(mostrarValores);

    function agregar() {

        //Obtener valores del select
        datosProducto = document.getElementById('inputproducto').value.split('_');

        let idproducto = datosProducto[0];
        let producto = $('#inputproducto option:selected').text();
        let cantidad = $('#inputcantidad').val();
        let stock = $('#inputstock').val();
        let precio = $('#inputprecio').val();

        if (idproducto != "" && precio != "" && stock != "" && cantidad != "") {
            if (parseInt(stock) >= parseInt(cantidad) && parseInt(cantidad) > 0) {
                subtotal[cont] = (cantidad * precio);
                total += subtotal[cont];
                //Agregar una fila
                let fila = '<tr class="selected" id="fila' + cont + '">' +
                    '<td><button class="btn btn-warning" onclick="eliminar(' + cont + ')" type="button">❌</button></td>' +
                    '<td><input type="hidden" name="arrayidproducto[]" value="' + idproducto + '">' + producto + '</td>' +
                    '<td><input  type="number" name="arraycantidad[]" value="' + cantidad + '"></td>' +
                    '<td><input  type="number" name="arrayprecio[]" value="' + precio + '"></td>' +
                    '<td>' + subtotal[cont] + '</td>' +
                    '</tr>';
                cont++;
                limpiar();

                //Actualizar total
                $('#total').html('$/. ' + total);
                $('#total_venta').val(total);

                evaluar();

                //Agregar fila a la tabla
                $('#table_registros').append(fila);
            } else {
                mostrarModal("Ha ingresado datos incorrectos", "warning");
            }
        } else {
            mostrarModal("Le faltan llenar campos", "error");
        }
    }

    function limpiar() {
        //$('#inputproducto').html('');
        /*const inputproducto = document.getElementById('inputproducto');
        console.log(inputproducto);
        inputproducto.title="Seleciona un producto";*/
        //$('#inputproducto').val("nulo");
        $('#inputprecio').val("");
        $('#inputstock').val("");
        $('#inputcantidad').val("");
    }

    function evaluar() {
        const btnguardar = document.getElementById('btnGuardar');
        if (total > 0) {
            btnguardar.disabled = false;
        } else {
            btnguardar.disabled = true;
        }
    }

    function eliminar(index) {
        total = total - subtotal[index];
        $('#total').html('$/. ' + total);
        $('#total_venta').val(total);
        $('#fila' + index).remove();
        evaluar();
    }

    function mostrarValores() {
        datosProducto = document.getElementById('inputproducto').value.split('_');
        $('#inputstock').val(datosProducto[1]);
        $('#inputprecio').val(datosProducto[2]);
    }

    function mostrarModal(message, icon) {
        let messages = "" + message;

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: icon,
            title: messages
        })
    }
</script>

@endsection