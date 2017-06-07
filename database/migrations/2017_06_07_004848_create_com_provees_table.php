<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComProveesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_provees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rif_cedula', 255);
            $table->string('razon_social', 255);
            $table->text('direccion');
            $table->string('telefono',20);
            $table->text('descripcion');
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
        Schema::dropIfExists('com_provees');
    }
}
