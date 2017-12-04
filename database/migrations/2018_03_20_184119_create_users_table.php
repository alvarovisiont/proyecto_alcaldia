<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('nac',1);
            $table->string('cedula', 10);
            $table->string('usuario');
            $table->string('telefono');
            $table->string('password');
            $table->integer('rol_id')->unsigned();
            $table->integer('departamento_id')->unsigned();
            $table->foreign('rol_id')->references('id_rol')->on('roles');
            $table->foreign('departamento_id')->references('id_departamento')->on('departamentos');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
