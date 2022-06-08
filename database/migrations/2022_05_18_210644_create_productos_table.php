<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**https://laravel.com/docs/8.x/migrations#introduction */
/**Clase creada con el comando de crear un nuevo modelo
 * Migración creada a través del modelo producto
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
        /**Creación de la tabla productos */
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->string('cod_producto',255)->nullable();
            $table->string('name');
            $table->text('description');
            $table->decimal('amount',$precision=8, $escale=2);
            $table->date('fecha_vencimiento')->nullable();    
            $table->integer('stock')->nullable();

            //Laves foraneas
            $table -> unsignedBigInteger('categoria_id');
            $table -> unsignedBigInteger('unidadMedida_id');
            $table -> unsignedBigInteger('presentacion_id');

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
        Schema::dropIfExists('productos');
    }
};
