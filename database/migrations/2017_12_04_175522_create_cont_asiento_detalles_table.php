<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContAsientoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cont_asiento_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cont_asientos_id')->unsigned();
            $table->integer('cont__master_accounts_id')->unsigned();
            $table->integer('cont_auxiliares_id')->nullable();
            $table->integer('cont_configs_id')->unsigned();
            $table->string('referencia')->nullable();
            $table->double('debe',15,2)->nullable()->default(0);
            $table->double('haber',15,2)->nullable()->default(0);
            $table->foreign('cont_asientos_id')->references('id')->on('cont_asientos');
            $table->foreign('cont__master_accounts_id')->references('id')->on('cont__master_accounts');
            $table->foreign('cont_configs_id')->references('id')->on('cont_configs');
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
        Schema::dropIfExists('cont_asiento_detalles');
    }
}
