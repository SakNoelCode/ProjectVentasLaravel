<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\producto;

/**Modelo creado con el comando php artisan make:model presentaciones -m 
 *También creamos su respectiva migración gracias al -m
*/

class presentaciones extends Model
{
    use HasFactory;

    public function productos(){ 
        return $this->hasMany(producto::class);
    }


    /**Uso de Getters and Setters para el campo presentacion*/
    protected function presentacion():Attribute
    {
        return new Attribute(

            /**Obtener Primeras letras en mayúsculas */
            get:function($value){
                return ucwords($value);
            }
            ,
            /**Guardar en minusculas */
            set:function($value){
                return strtolower($value);
            }
        );
    }

}
