<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\presentaciones;
use App\Models\producto;
use App\Models\unidadesMedidas;
use App\Http\Requests\storeProductoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


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
        $unidadesMedida = unidadesMedidas::all();
        $presentaciones = presentaciones::all();

        return view('Productos.index', [
            'productos' => $productos,
            'categorias' => $categorias,
            'unidadesMedida' => $unidadesMedida,
            'presentaciones' => $presentaciones
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = categoria::all();
        $unidadesMedida = unidadesMedidas::all();
        $presentaciones = presentaciones::all();
        return view('Productos.create', [
            'categorias' => $categorias,
            'unidadesMedida' => $unidadesMedida,
            'presentaciones' => $presentaciones
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Hacemos uso del storeProductoRequest
    public function store(storeProductoRequest $request)
    {
        $producto = new producto();
        $producto->cod_producto = $request->cod_producto;
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->amount = $request->amount;
        $producto->fecha_vencimiento = $request->fecha;
        $producto->stock = $request->stock;
        $producto->categoria_id = $request->category_id;
        $producto->unidadMedida_id = $request->unidadmedida_id;
        $producto->presentacion_id = $request->presentacion_id;

        //dd($producto);
        $producto->save();

        //Asignación Masiva
        //Esto funciona porque en el modelo se ha creado la variable filable
        //$producto = producto::created($request->all());

        return redirect()->route('productos.create')->with('success', 'Producto añadido');
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
        $unidadesMedida = unidadesMedidas::all();
        $presentaciones = presentaciones::all();

        return view('Productos.show', [
            'producto' => $producto,
            'categorias' => $categorias,
            'unidadesMedida' => $unidadesMedida,
            'presentaciones' => $presentaciones
        ]);
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
        $producto = Producto::find($id);

        //dd($request->all());obtener data en array
        //Guardar en la base de datos los valores ignorando los id propios
        $messages = [
            'cod_producto.required' => 'Debe ingresar un código'
        ];

        $customAttributes = [
            'cod_producto' => 'código',
            'name' => 'nombre',
            'description' => 'descripción',
            'amount' => 'precio',
            'fecha' => 'fecha Vencimiento',
            'stock' => 'stock',
            'category_id' => 'categoria',
            'unidadmedida_id' => 'unidad de Medida',
            'presentacion_id' => 'presentación',
        ];

        Validator::make(
            $request->all(),
            [
                'cod_producto' => [
                    'required',
                    Rule::unique('productos', 'cod_producto')->ignore($producto->id),
                ],
                'name' => [
                    'required',
                    Rule::unique('productos', 'name')->ignore($producto->id),
                ],
                'description' => 'required|max:255',
                'amount' => 'required|numeric',
                'fecha' => 'date|nullable',
                'category_id' => 'required|integer',
                'unidadmedida_id' => 'required|integer',
                'presentacion_id' => 'required|integer',
            ],
            $messages,
            $customAttributes
        )->validate();

        //dd($request);

        $producto->cod_producto = $request->cod_producto;
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->amount = $request->amount;
        $producto->fecha_vencimiento = $request->fecha;
        $producto->categoria_id = $request->category_id;
        $producto->unidadMedida_id = $request->unidadmedida_id;
        $producto->presentacion_id = $request->presentacion_id;

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto actualizado');
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
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado');
    }

    public function addStock(Request $request, $id)
    {
        $producto = producto::find($id);

        $validator = Validator::make($request->all(), [
            'newStock' => 'required|integer|gte:1',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('productos.index')
                ->with('error', 'Entrada inválida');
            /*->withErrors($validator)
                ->withInput();*/
        }
        
        $producto->stock = (int) $producto->stock + (int) $request->newStock;

        $producto->save();

        return redirect()->route('productos.index')->with('success','Exito');
    }
}
