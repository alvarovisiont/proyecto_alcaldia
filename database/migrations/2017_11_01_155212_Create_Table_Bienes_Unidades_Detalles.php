<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBienesUnidadesDetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes_unidades_detalles', function(Blueprint $table){
            $table->increments('id');
            $table->integer('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('id')->on('bienes_unidades')->onDelete('cascade');
            $table->string('descripcion');
            $table->string('actividad')->nullable()->default(0);
            $table->string('ubicacion')->nullable();
            $table->string('seccion');
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
        Schema::dropIfExists('bienes_unidades_detalles');
    }
}
