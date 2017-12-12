<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBienesBienes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes_bienes', function(Blueprint $table){
            $table->increments('id');
            $table->string('codigo');
            $table->integer('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('id')->on('bienes_unidades')->onDelete('cascade');
            $table->integer('unidad_detalles_id')->unsigned();
            $table->foreign('unidad_detalles_id')->references('id')->on('bienes_unidades_detalles')->onDelete('cascade');
            $table->integer('tipo_bien_id')->unsigned();
            $table->foreign('tipo_bien_id')->references('id')->on('bienes_tipo_bien')->onDelete('cascade');
            $table->string('descripcion');
            $table->date('fecha');
            $table->string('descripcion_general')->nullable();
            $table->string('id_orden_compra')->default(0);
            $table->string('id_insumo')->default(0);
            $table->string('foto')->default(0);
            $table->integer('unidad1')->unsigned()->nullable();
            $table->foreign('unidad1')->references('id')->on('bienes_unidades')->onDelete('cascade');
            $table->integer('seccion1')->unsigned()->nullable();
            $table->foreign('seccion1')->references('id')->on('bienes_unidades_detalles')->onDelete('cascade');
            $table->decimal('precio',14,2)->default(0);
            $table->string('status')->default(0);
            $table->integer('concepto_id')->unsigned()->nullable();
            $table->foreign('concepto_id')->references('id')->on('bienes_conceptos')->onDelete('cascade');
            $table->string('direccion')->default(0);
            $table->string('categoria')->default(0);
            $table->string('qr_code')->nullable();
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
        Schema::dropIfExists('bienes_bienes');
    }
}
