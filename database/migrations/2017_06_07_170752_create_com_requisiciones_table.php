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
            $table->date('fecha');
            $table->string('status',255);
            $table->text('des_unidad');
            $table->string('unidad');
            $table->string('centro');
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