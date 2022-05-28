<?php

use App\Http\Controllers\categoriasController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\productosController;
use App\Http\Controllers\registerController;
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
/*Retornar La vista index cuando accedamos a la ruta raíz */
Route::view('/', 'Panel.panel') -> name('panel');


/*Retornar la vista Panel.panel cuando Estemos en la ruta /Panel (Inactivos) */ 
Route::view('/index', 'index') -> name('index');
Route::view('/home', 'layout') -> name('home');

/* Retornar la vista clientes cuando estemos en la ruta /Clientes*/
Route::view('/Clientes','Clientes.clientes') -> name('clientes');

/**Retornar la Vista productos cuando estemos en la ruta /Productos */
Route::view('/Productos','Productos.productos') -> name('productos');

/**Retornar la Vista Categorías cuando estemos en la ruta /Categorias */
//Route::view('/Categorias','Categorias.categorias') -> name('categorias');


/*------------------RETORNAR CUANDO SE EJECUTEN METODOS POST---------------*/

/**Establecer ruta para cuando la comunicación sea post, 
 * en este ejemplo se llama a la clase ClientesController
 * y a su función store */
Route::post('/Clientes', [clientesController::class,'store']) -> name('clientes');

Route::post('/Productos',[productosController::class,'store']) -> name('productos');


/*------------------RETORNAR CUANDO SE EJECUTEN METODOS GET---------------*/

/**Establecer ruta para cuando la comunicación sea get, 
 * en este ejemplo se llama a la clase ClientesController
 * y a su función index 
 * Los métodos GET se llaman automaticamente cuando se ejecute la ruta*/
Route::get('/Clientes', [clientesController::class,'index']) -> name('clientes');
/**La ruta debe contener un ID y se ejecutará la función show*/
Route::get('/Clientes/{id}', [clientesController::class,'show']) -> name('clientes-show');

Route::get( '/Productos',[productosController::class,"index"]) -> name('productos');

Route::get('/Productos/{id}',[productosController::class,'show'])->name('productos-show');

/*------------------RETORNAR CUANDO SE EJECUTEN OTROS METODOS PATCH O PUT, ETC---------------*/
/*PATCH se usa para actualizar datos parciales (algunos campos) 
 * PUT se usa para actualizar todos los datos (todos los campos).
 * DELETE se usa para eliminar un registro de la base de datos*/

 /**La ruta debe contener un ID y se ejecutará la función update*/
Route::patch('/Clientes/{id}', [clientesController::class,'update']) -> name('clientes-update'); 
 /**La ruta debe contener un ID y se ejecutará la función destroy*/
Route::delete('/Clientes/{id}', [clientesController::class,'destroy']) -> name('clientes-destroy');

Route::patch('/Productos/{id}',[productosController::class,'update'])->name('productos-update');

Route::delete('/Productos/{id}',[productosController::class,'destroy'])->name('productos-destroy');


/**Cuando añadimos un modelo como recurso se puede automaticameente añadir todas sus 
 * rutas de la siguiente manera
 */
Route::resource('categorias',categoriasController::class);

/**Ruta para mostrar la vista de register */
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

/**Ruta para el método post de register */
Route::post('/register', [registerController::class, 'register'])->name('register');


/**Ruta para nuestro Login 
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
*/