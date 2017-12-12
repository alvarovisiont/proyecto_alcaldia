<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBienesTipoBien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes_tipo_bien', function(Blueprint $table){
            $table->increments('id');
            $table->integer('nomenclatura_id')->unsigned();
            $table->foreign('nomenclatura_id')->references('id')->on('bienes_nomenclatura')->onDelete('cascade');
            $table->string('codigo',5)->nullable();
            $table->string('descripcion');
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
        Schema::dropIfExists('bienes_tipo_bien');
    }
}
