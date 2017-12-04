<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContAuxiliaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cont_auxiliares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('auxiliar');
            $table->text('descripcion');
            $table->integer('cont__master_accounts_id')->unsigned();
            $table->integer('cont_configs_id')->unsigned();
            $table->foreign('cont_configs_id')->references('id')->on('cont_configs');
            $table->foreign('cont__master_accounts_id')->references('id')->on('cont__master_accounts');
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
        Schema::dropIfExists('cont_auxiliares');
    }
}
