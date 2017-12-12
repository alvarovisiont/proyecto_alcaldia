<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBienesMovimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes_movimientos', function(Blueprint $table){
            $table->increments('id');
            $table->integer('bien_id')->unsigned();
            $table->foreign('bien_id')->references('id')->on('bienes_bienes')->onDelete('cascade');
            $table->date('fecha');
            $table->integer('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('id')->on('bienes_unidades')->onDelete('cascade');
            $table->integer('unidad_detalles_id')->unsigned();
            $table->foreign('unidad_detalles_id')->references('id')->on('bienes_unidades_detalles')->onDelete('cascade');
            $table->string('observacion')->nullable();
            $table->string('foto')->nullable();
            $table->integer('concepto_id')->unsigned();
            $table->foreign('concepto_id')->references('id')->on('bienes_conceptos')->onDelete('cascade');
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
        Schema::dropIfExists('bienes_movimientos');
    }
}
