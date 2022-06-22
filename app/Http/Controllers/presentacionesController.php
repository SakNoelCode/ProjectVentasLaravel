<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\presentaciones;
/**Controlador creado a través del comando php artisan make:controller presentacionesController --resource
 * Esta clase nos sirve para crear la lógica de negocio de nuestra aplicación
 * Une la Vista con el Modelo
 * resource -- Crea automaticamente todos los métodos para el manejo de datos
 * https://laravel.com/docs/8.x/controllers#actions-handled-by-resource-controller
*/
class presentacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentaciones = presentaciones::all();
        //$presentaciones = presentaciones::orderBy('id','asc')->paginate();
        return view('Presentaciones.index',['presentaciones' => $presentaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Presentaciones.create');
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
            'presentacion' => 'required|max:255|unique:presentaciones',
            'description' => 'max:255'
        ]);

        $presentacion =  new presentaciones();
        $presentacion->presentacion = $request->presentacion;
        $presentacion->descripcion = $request->description;
        if(isset($request->cboEstado)){
            $presentacion->estado = 'ACTIVO';
        }else{
            $presentacion->estado = 'INACTIVO';
        }
        
        $presentacion->save();
        return redirect()->route('presentaciones.create')->with('success','Registro exitoso');
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
        $presentacion = presentaciones::find($id);
        return view('Presentaciones.show',['presentacion' => $presentacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
        $presentacion = presentaciones::find($id);
        return view('Presentaciones.edit',['presentacion' => $presentacion]);*/
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
        $request->validate([
            'presentacion' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $presentacion =  presentaciones::find($id);
        $presentacion->presentacion = $request->presentacion;
        $presentacion->descripcion = $request->description;
        if(isset($request->cboEstado)){
            $presentacion->estado = 'ACTIVO';
        }else{
            $presentacion->estado = 'INACTIVO';
        }

        $presentacion->save();
        
        return redirect()->route('presentaciones.index')->with('success','Registro actualizado');
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

    public function search(){
        $presentaciones = presentaciones::paginate();
        return view('Presentaciones.search',['presentaciones' => $presentaciones]);
    }
}
