<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientes;

/**Controlador creado a través del comando php artisan make:controller clientesController 
 * Esta clase nos sirve para crear la lógica de negocio de nuestra aplicación
 * Une la Vista con el Modelo
 */

class clientesController extends Controller
{
    /**Métodos que se utilizan en Laravel
     * index: muestra todos los clientes
     * store: Guarda los clientes, añade un nuevo registro
     * update: Actualiza los clientes
     * destroy: Elimina un cliente
     * show: muestra el formulario de edición 
     */

    public function store(Request $request)
    {
        /**El método validate nos permite validar la 
         * información que se recibe
         * required : El campo no puede estar vacío
         * min, max : Mínimo y máximo de carácteres
         */

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'dni' => 'required|max:8|min:8|unique:clientes|numeric',
            'address' => 'required'
        ]);

        /**Se crea un objeto de la clase Clientes */
        $cliente = new clientes();
        $cliente->name = $request->name;
        $cliente->surname = $request->surname;
        $cliente->dni = $request->dni;
        $cliente->address = $request->address;

        /**Guardamos los valores */
        $cliente->save();

        /**Redirigimos a una determinada ruta con un mensaje */
        return redirect()->route('clientes.index')->with('success', 'Cliente añadido');
    }

    public function index()
    {
        /**a la variable clientes se le asigna el modelo Cliente de la base de datos
         * Contiene todos los valores de la base de datos
         */
        $clientes = clientes::all();
        /**Cuando sea llamado devolverá una lista de todos los clientes */
        return view('Clientes.index', ['clientes' => $clientes]);
    }

    public function create()
    {
        return view('Clientes.create');
    }


    /**Dado que se nos esta enviando una solicitud, debemos utlizar la variable $request para
     * obtener los valores de la petición
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'dni' => 'required|max:8|min:8',
            'address' => 'required'
        ]);
        /**Se asigna a la variable cliente aquel que tenga el ID que hallo en su búsqueda */
        $cliente = clientes::find($id);
        /**Se actualiza los valores de la tabla */
        $cliente->Name = $request->name;
        $cliente->Surname = $request->surname;
        $cliente->DNI = $request->dni;
        $cliente->Address = $request->address;
        /*Guardar valores*/
        $cliente->save();

        /*   Usado para hacer Debug:   dd($request);*/
        /**Redirigimos a una vista con un mensaje */
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado');
    }

    public function destroy($id)
    {
        /**Se asigna a la variable cliente aquel que tenga el ID que hallo en su búsqueda */
        $cliente = Clientes::find($id);
        /**Elimar valor */
        $cliente->delete();
        /**Redirigimos a una vista con un mensaje */
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado');
    }

    public function show($id)
    {
        /**Se asigna a la variable cliente aquel que tenga el ID que hallo en su búsqueda */
        $cliente = Clientes::find($id);
        /**Se retorna la vista show, enviando como parametro al Cliente */
        return view('Clientes.show', ['Cliente' => $cliente]);
    }
}
