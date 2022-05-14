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
     * edit: muestra el formulario de edición 
     */

     public function store(Request $request){
         /**El método validate nos permite validar la 
          * información que se recibe
          * required : El campo no puede estar vacío
          * min, max : Mínimo y máximo de carácteres
          */

         $request->validate([
             'name' => 'required',
             'surname' => 'required',
             'dni' => 'required',
             'address' => 'required'
         ]);

         /**Se crea un objeto de la clase Clientes */
         $cliente = new clientes();
         $cliente -> name = $request -> name; 
         $cliente -> surname = $request -> surname;
         $cliente -> dni = $request -> dni;
         $cliente -> address = $request -> address;

         /**Guardamos los valores */
         $cliente -> save();

         /**Redirigimos a una determinada ruta */
         return redirect()-> route('clientes')->with('success','Cliente añadido');
     }
}
