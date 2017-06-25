<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComOrdenesDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_ordenes_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('com_ordenes_id')->unsigned();
            $table->string('item_insumo');
            $table->text('descripcion');
            $table->decimal('cantidad',10,2);
            $table->string('unidad');
            $table->decimal('base',15,2);
            $table->decimal('sub_total',15,2);
            $table->decimal('iva',15,2);
            $table->integer('iva_porcentaje');
            $table->decimal('total',15,2);
            $table->integer('ano');
            $table->foreign('com_ordenes_id')->references('id')->on('com_ordenes');

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
        Schema::dropIfExists('com_ordenes_detalles');
    }
}
