<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Migración creada con el comando:
     * php artisan make:migration add_categoryId_to_ProductoTable --table=productos
     * La función de esta clase es crear un campo en la tabla productos que haga referencia a las 
     * categorías
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            //
            //Se crea un nuevo campo en la tabla productos, con el nombre de categoria_id
            //$table -> unsignedBigInteger('categoria_id');
            //al campo creado se le hace trabajar como llave foranea, y hará referencia de la 
            //tabla categorias en el campo id, será colocada después del campo amount
            $table -> foreign('categoria_id')->references('id')->on('categorias');

            //$table->unsignedBigInteger('unidadMedida_id');
            //$table->foreign('unidadMedida_id')->references('id')->on('unidades_medidas')->after('stock');
            //$table->unsignedBigInteger('presentacion_id');
            //$table->foreign('presentacion_id')->references('id')->on('presentaciones')->after('unidadMedida_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table -> dropForeign(['categoria_id']);
        });
    }
};
