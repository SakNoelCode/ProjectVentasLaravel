<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //Creacion de la tabla unidadesMedidas
    public function up()
    {
        Schema::create('unidades_medidas', function (Blueprint $table) {
            $table->id();

            $table->string('unidadMedida', 255);
            $table->string('descripcion', 255)->nullable();
            $table->string('estado', 10)->default('ACTIVO');

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
        Schema::dropIfExists('unidades_medidas');
    }
};
