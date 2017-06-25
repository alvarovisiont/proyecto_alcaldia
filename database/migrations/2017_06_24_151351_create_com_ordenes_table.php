<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('codigo');
            $table->integer('numero_control');
            $table->string('tipo_orden');
            $table->text('lugar_entrega');
            $table->string('forma_pago');
            $table->text('condicion_compra');
            $table->text('plazo_entrega');
            $table->date('fecha_orden');
            $table->string('com_requisiciones_codigo');
            $table->string('fecha_requisicion');
            $table->text('com_requisicion_concepto');
            $table->string('com_departamento_programatica');
            $table->string('com_departamento_unidad');
            $table->string('com_provees_rif');
            $table->string('com_provees_razon_social');
            $table->string('com_provees_direccion');

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
        Schema::dropIfExists('com_ordenes');
    }
}
