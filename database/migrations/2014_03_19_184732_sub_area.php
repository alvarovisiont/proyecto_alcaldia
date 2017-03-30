<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_area', function (Blueprint $table) {
            $table->increments('id_sub_area');
            $table->integer('area_id')->unsigned();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('ruta');
            $table->foreign('area_id')->references('id_area')->on('area');
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
        Schema::dropIfExists('sub_area');
    }
}
