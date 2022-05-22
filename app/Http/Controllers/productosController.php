<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\producto;
use Illuminate\Http\Request;

/**Controlador creado a través del comando php artisan make:controller productosController --resource
 * Esta clase nos sirve para crear la lógica de negocio de nuestra aplicación
 * Une la Vista con el Modelo
 * resource -- Crea automaticamente todos los métodos para el manejo de datos
 * https://laravel.com/docs/8.x/controllers#actions-handled-by-resource-controller
*/

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = producto::all();
        $categorias = categoria::all();

        return view('Productos.productos',['productos' => $productos, 'categorias' => $categorias]);
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
        $request -> validate([
            'name' => 'required|max:40',
            'description' => 'required|max:255',
            'amount' => 'required|numeric',
        ]);

        $producto = new producto();
        $producto -> name = $request -> name;
        $producto -> description = $request -> description;
        $producto -> amount = $request -> amount;
        $producto -> categoria_id = $request -> category_id;

        $producto -> save();

        return redirect() -> route('productos')->with('success','Producto añadido');

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
        $producto = Producto::find($id);
        $categorias = categoria::all();
        return view('Productos.show',['producto' => $producto,'categorias'=> $categorias]);
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
        $request -> validate([
            'name' => 'required|max:40',
            'description' => 'required|max:255',
            'amount' => 'required|numeric',
        ]);

        $producto = Producto::find($id);

        $producto -> name = $request -> name;
        $producto -> description = $request -> description;
        $producto -> amount = $request -> amount;
        $producto -> categoria_id = $request -> category_id;

        $producto -> save();

        return redirect() -> route('productos')->with('success','Producto actualizado');
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
        $producto = Producto::find($id);
        $producto -> delete();

        return redirect() -> route('productos')->with('success','Producto eliminado');
    }

}
