<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCarrera extends Migration
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
            $table->string('estatus')->default(); /*Para el eliminar la carrera*/
            $table->string('nom_carrera');
            $table->string('lugar_salida');
            $table->string('lugar_llegada');
            $table->string('fecha_carr');
            $table->string('hora');
            $table->string('meridiano');
            $table->string('modalidad');
            $table->string('categoria');
            $table->string('vuelta');
            $table->string('kilometraje');
            $table->string('monto');
            $table->string('camisa');
            $table->string('comida');
            $table->string('bebida');
            $table->string('cupos');
            $table->string('foto')->nullable();
            //$table->string('estado')->default(); /*Para el eliminar la carrera vencida*/ 
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
