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
Route::view('/Clientes','Clientes.clientes') -> name('clientes');



/*------------------RETORNAR CUANDO SE EJECUTEN METODOS POST---------------*/

/**Establecer ruta para cuando la comunicación sea post, 
 * en este ejemplo se llama a la clase ClientesController
 * y a su función store */
Route::post('/Clientes', [clientesController::class,'store']) -> name('clientes');


/*------------------RETORNAR CUANDO SE EJECUTEN METODOS GET---------------*/

/**Establecer ruta para cuando la comunicación sea get, 
 * en este ejemplo se llama a la clase ClientesController
 * y a su función index 
 * Los métodos GET se llaman automaticamente cuando se ejecute la ruta*/
Route::get('/Clientes', [clientesController::class,'index']) -> name('clientes');
/**La ruta debe contener un ID y se ejecutará la función show*/
Route::get('/Clientes/{id}', [clientesController::class,'show']) -> name('clientes-show');


/*------------------RETORNAR CUANDO SE EJECUTEN OTROS METODOS PATCH O PUT, ETC---------------*/
/*PATCH se usa para actualizar datos parciales (algunos campos) 
 * PUT se usa para actualizar todos los datos (todos los campos).
 * DELETE se usa para eliminar un registro de la base de datos*/

 /**La ruta debe contener un ID y se ejecutará la función update*/
Route::patch('/Clientes/{id}', [clientesController::class,'update']) -> name('clientes-update'); 
 /**La ruta debe contener un ID y se ejecutará la función destroy*/
Route::delete('/Clientes/{id}', [clientesController::class,'destroy']) -> name('clientes-destroy');
