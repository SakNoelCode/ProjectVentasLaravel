<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**Clase creada con el comando de crear un nuevo modelo
 * Migración creada a través del modelo clientes
 * 
 * Para ejecutar una migración usar el comando php artisan migrate 
 * Más Comandos:
 * php artisan migrate:status   --> Nos muestra un resumen de nuestras migraciones
 * php artisan migrate:rollback --> Deshace la última migración que hemos hecho
 */

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**Se va a crear una nueva Tabla clientes con sus respectivos campos */
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();

            $table->string('Name');
            $table->string('Surname');
            $table->string('DNI');
            $table->string('Address');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
