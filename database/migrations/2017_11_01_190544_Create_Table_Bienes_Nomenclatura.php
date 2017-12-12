<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBienesNomenclatura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes_nomenclatura', function(Blueprint $table){
            $table->increments('id');
            $table->integer('grupo')->unsigned();
            $table->integer('sub_grupo')->unsigned()->nullable();
            $table->integer('sub_sub_grupo')->unsigned()->nullable()->default(0);
            $table->string('descripcion')->nullable();
            $table->integer('tipo')->nullable();
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
        Schema::dropIfExists('bienes_nomenclatura');
    }
}
