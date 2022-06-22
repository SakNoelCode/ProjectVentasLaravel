<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**Modelo creado con el comando php artisan make:model unidadesMedidas -m 
 *También creamos su respectiva migración gracias al -m
*/
class unidadesMedidas extends Model
{
    use HasFactory;

    /**Uso de Getters and Setters */
    protected function unidadMedida():Attribute
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
