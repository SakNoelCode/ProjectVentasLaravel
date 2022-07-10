<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Http\Requests\ventasRequest;
use App\Models\venta;
use App\Models\detalle_venta;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        if ($request) {
            //$query = trim($request->get('search text'));

            $ventas = DB::table('ventas as v')
                ->join('clientes as c', 'v.cliente_id', '=', 'c.id')
                ->join('detalle_ventas as dv', 'v.id', '=', 'dv.venta_id')
                ->select('v.numero', 'v.total', 'v.fecha', 'c.Name as nameClient')
                ->orderBy('v.id', 'desc')
                // ->groupBy()
                ->get();

            return view('Ventas.index', ['ventas' => $ventas]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = DB::table('clientes')->get();
        $productos = DB::table('productos as p')
            ->select(
                DB::raw('CONCAT(p.cod_producto," _ ",p.name) as producto'),
                'p.id',
                'p.amount',
                'p.stock'
            )
            ->where('p.stock', '>', '0')
            //->groupBy('')
            ->get();
        /*$user = DB::table('users as u')
        ->where('u.id','=','Auth()->user()->id')
        ->get();*/
        return view('Ventas.create', ['clientes' => $clientes, 'productos' => $productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ventasRequest $request)
    {
        //dd($request);
        try {
            DB::beginTransaction();

            /*Guardar Venta*/
            $venta = new venta();
            $venta->numero = $request->get('numero');
            $venta->total = $request->get('total_venta');
            $mydate = Carbon::now('America/Lima');   //Obtener fecha por zona horaria
            $venta->fecha = $mydate->toDateString();
            $venta->impuesto = 18;
            $venta->estado = 'ACTIVO';
            $venta->cliente_id = $request->get('cliente_id');
            $venta->user_id = Auth()->user()->id;
            //dd($venta);
            $venta->save();

            /**Crear variables de array*/
            $cantidad = $request->get('arraycantidad');
            $precio = $request->get('arrayprecio');
            $producto_id = $request->get('arrayidproducto');

            $cont = 0;

            while ($cont < count($producto_id)) {
                /*Guardar Detalle Venta*/
                $detalle = new detalle_venta();
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio = $precio[$cont];
                $detalle->subtotal = $cantidad[$cont] * $precio[$cont];
                $detalle->estado = 'ACTIVO';
                $detalle->producto_id = $producto_id[$cont];
                $detalle->venta_id = $venta->id;
                //dd($detalle);
                $detalle->save();
                $cont++;
            }
            
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('ventas.index')->with('success', 'Registro exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $venta = DB::table('ventas as v')
            ->join('clientes as c', 'v.cliente_id', '=', 'c.id')
            ->join('detalle_ventas as dv', 'v.id', '=', 'dv.venta_id')
            ->select('v.numero', 'v.total', 'v.fecha', 'v.estado')
            ->where('v.id', '=', $id)
            ->first();

        $detalleVenta = DB::table('detalle_ventas as dv')
            ->join('productos as p', "p.id", "=", "dv.producto_id")
            ->select('dv.cantidad', 'dv.precio', 'dv.subtotal', 'dv.estado')
            ->where('dv.venta_id', '=', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Cancelar Venta
    public function destroy($id)
    {
        $venta = venta::findOrFail($id);
        $venta->estado = 'INACTIVO';
        $venta->update();

        return redirect()->route('ventas.index');
    }
}
