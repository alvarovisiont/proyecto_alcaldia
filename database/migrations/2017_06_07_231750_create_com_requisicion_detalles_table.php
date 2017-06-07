<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComRequisicionDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_requisicion_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('com_requisicion_id')->unsigned();
            $tabla->decimal('cantidad',10,2);
            $tabla->string('unidad',255);
            $table->integer('com_insumo_id')->unsigned();
            $table->string('des_insumo',255);
            $table->integer('ano');
            $table->foreign('com_requisicion_id')->references('id')->on('com_requisicion');
            $table->foreign('com_insumo_id')->references('id')->on('com_insumos');
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
        Schema::dropIfExists('com_requisicion_detalles');
    }
}
