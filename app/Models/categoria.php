<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\producto;

/**Modelo creado con el comando php artisan make:model categoria -m 
 *También creamos su respectiva migración gracias al -m
*/

class categoria extends Model
{
    use HasFactory;

    /**Este modelo va a tener una relación uno a muchos con la tabla Producto */
    //Una categoría puede tener muchos productos, se establece la conexión con la 
    //llave foránea 
    public function productos(){ 
        return $this->hasMany(producto::class);
    }
}
