<?php

use App\Http\Controllers\clientesController;
use Illuminate\Support\Facades\Route;

/*
|----------------------------------------------------------------- -------------------------
| Rutas Web
|----------------------------------------------------------------- -------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estas
| rutas son cargadas por el RouteServiceProvider dentro de un grupo que
| contiene el grupo de middleware "web". ¡Ahora crea algo grandioso!
|
|Notas:
| name: se usa para identificar la vista, debe ser única
*/

/*------------------RETORNAR VISTAS--------------------*/
/*Retornar La vista app cuando accedamos a la ruta raíz */
Route::view('/', 'layout') -> name('home');

/*Retornar la vista Welcome cuando Estemos en la ruta /Bienvenida*/
Route::view('/Bienvenida','welcome') -> name('welcome');

/* Retornar la vista CrudClientes cuando estemos en la ruta /Clientes*/
Route::view('/Clientes','Clientes.crudClientes') -> name('clientes');




/*------------------RETORNAR CUANDO SE EJECUTEN METODOS POST---------------*/

/**Establecer ruta para cuando la comunicación sea post, 
 * en este ejemplo se llama a la clase ClientesController
 * y a su función store */
Route::post('/Clientes', [clientesController::class,'store']) -> name('clientes');
