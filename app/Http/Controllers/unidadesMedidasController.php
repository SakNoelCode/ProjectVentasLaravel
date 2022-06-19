<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\unidadesMedidas;

/**Controlador creado a través del comando php artisan make:controller unidadesMedidasController --resource
 * Esta clase nos sirve para crear la lógica de negocio de nuestra aplicación
 * Une la Vista con el Modelo
 * resource -- Crea automaticamente todos los métodos para el manejo de datos
 * https://laravel.com/docs/8.x/controllers#actions-handled-by-resource-controller
 */

class unidadesMedidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $unidadesMedidas = unidadesMedidas::all();
        return view('UnidadesMedidas.index', ['unidadesMedidas' => $unidadesMedidas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'unidadMedida' => 'required|max:255|unique:unidades_medidas',
            'description' => 'max:255'
        ]);

        $unidadMedida =  new unidadesMedidas();
        $unidadMedida->unidadMedida = $request->unidadMedida;
        $unidadMedida->descripcion = $request->description;
        if (isset($request->cboEstado)) {
            $unidadMedida->estado = 'ACTIVO';
        } else {
            $unidadMedida->estado = 'INACTIVO';
        }
        //dd($unidadMedida);
        $unidadMedida->save();
        return redirect()->route('unidadesMedidas.index')->with('success', 'Registro exitoso');
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
        $unidadMedida = unidadesMedidas::find($id);
        return view('UnidadesMedidas.show', ['unidadMedida' => $unidadMedida]);
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
        $request->validate([
            'unidadMedida' => 'required|max:255',
            'description' => 'max:255'
        ]);

        $unidadMedida =  unidadesMedidas::find($id);
        $unidadMedida->unidadMedida = $request->unidadMedida;
        $unidadMedida->descripcion = $request->description;
        if (isset($request->cboEstado)) {
            $unidadMedida->estado = 'ACTIVO';
        } else {
            $unidadMedida->estado = 'INACTIVO';
        }
        //dd($unidadMedida);
        $unidadMedida->save();
        return redirect()->route('unidadesMedidas.index')->with('success', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
