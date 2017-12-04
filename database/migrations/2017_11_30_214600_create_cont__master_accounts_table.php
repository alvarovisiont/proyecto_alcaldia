<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContMasterAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cont__master_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cuenta');
            $table->string('descripcion');
            $table->smallInteger('operativa')->default(0);
            $table->smallInteger('detalle')->default(0);
            $table->mediumInteger('p21');
            $table->mediumInteger('ano');
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
        Schema::dropIfExists('cont__master_accounts');
    }
}
