<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**Modelo creado con el comando php artisan make:model producto -m 
 *También creamos su respectiva migración gracias al -m
 */
class producto extends Model
{
    use HasFactory;

    /**Asignación Masiva */
    /*Campos que pueden llenarse
    protected $filable = [
        'cod_producto',
        'name',
        'description',
        'amount',
        'fecha_vencimiento',
        'stock',
        'categoria_id',
        'unidadMedida_id',
        'presentacion_id'
    ];
    //Campos protegidos
    //protected $guarded = [];*/





    /**Campo name 
     *  get: es un accesor "permite tomar datos y modificar la consulta de bd antes demostrar"*/
    /*  set: es un mutador "permite  modificar los datos antes de guardar en la bd"
    */
    protected function name(): Attribute
    {
        return new Attribute(
            /**Función que nos permite recuperar el valor con las primeras letras en 
             * mayúsculas (Accesor) */
            get: function ($value) {
                return ucwords($value);
            },
            /**Función que nos permite guardar el campo description en minusculas* (Mutador)*/
            set: function ($value) {
                return strtolower($value);
            }
        );
    }
}
