<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrera', function (Blueprint $table) {
            $table->bigIncrements('id');
           
            $table->bigInteger('corredor_id')->unsigned();
            $table->foreign('corredor_id')->references('id')->on('corredor')->onDelete('cascade');

            $table->bigInteger('adm_id')->unsigned();
            $table->foreign('adm_id')->references('id')->on('administrador')->onDelete('cascade');

            $table->string('carrera');
            $table->string('descripcion');
            $table->string('fecha_carr');
            $table->string('lugar');
            $table->string('costo');
            $table->string('kit_carrera');
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
        Schema::dropIfExists('carrera');
    }
}
