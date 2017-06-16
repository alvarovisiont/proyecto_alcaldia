<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComRequisicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_requisiciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',255);
            $table->text('descripcion');
            $table->string('fecha');
            $table->string('status',255);
            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('com_departamentos')->onDelete('cascade');
            $table->string('centro')->nullable();
            $table->integer('ano');
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
        Schema::dropIfExists('com_requisiciones');
    }
}