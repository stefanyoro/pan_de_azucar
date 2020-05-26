<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultado', function (Blueprint $table) {
            $table->bigIncrements('id');
            //Datos del corredor
            $table->bigInteger('corredor_id')->unsigned();
            $table->foreign('corredor_id')->references('id')->on('corredor')->onDelete('cascade');
            /*//Datos de los inscritos
            /*$table->bigInteger('inscrito_id')->unsigned();
            $table->foreign('inscrito_id')->references('id')->on('inscribir')->onDelete('cascade');
            //Datos de la carrera*/
            $table->bigInteger('carrera_id')->unsigned();
            $table->foreign('carrera_id')->references('id')->on('carrera')->onDelete('cascade');
            //datos de la vista
            $table->string('tiempo');
            $table->string('posicion');

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
        Schema::dropIfExists('resultado');
    }
}
