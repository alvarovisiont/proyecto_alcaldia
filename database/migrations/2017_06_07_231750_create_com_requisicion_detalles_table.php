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
            $table->integer('codigo');
            $table->decimal('cantidad',10,2);
            $table->integer('com_insumo_id')->unsigned();
            $table->integer('ano');
            $table->foreign('com_insumo_id')->references('id')->on('com_insumos');
            $table->integer('com_req_id')->unsigned();
            $table->foreign('com_req_id')->references('id')->on('com_requisiciones')->onDelete('cascade');
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
