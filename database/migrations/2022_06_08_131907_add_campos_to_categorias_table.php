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
    public function up()
    {
        Schema::table('categorias', function (Blueprint $table) {
            
            //Agregar campos
            $table -> string('descripcion',255) -> nullable()->after('name');
            $table -> string('estado',10) -> nullable()->after('descripcion')->default('ACTIVO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categorias', function (Blueprint $table) {

            //Eliminar campos
            $table -> dropColumn('descripcion');
            $table -> dropColumn('estado');
        });
    }
};
