<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContAsientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cont_asientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comprobante');
            $table->text('descripcion');
            $table->date('fecha');
            $table->smallInteger('status');
            $table->integer('cont_configs_id')->unsigned();
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
        Schema::dropIfExists('cont_asientos');
    }
}
