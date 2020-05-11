<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanEntrenamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_entrenamiento', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('entrenador_id')->unsigned();
            $table->foreign('entrenador_id')->references('id')->on('entrenador')->onDelete('cascade');

            $table->bigInteger('corredor_id')->unsigned();
            $table->foreign('corredor_id')->references('id')->on('corredor')->onDelete('cascade');


            $table->bigInteger('nutri_id')->unsigned();
            $table->foreign('nutri_id')->references('id')->on('nutricionista')->onDelete('cascade');
            $table->string('modalidad');
            $table->string('ejercicio');
            $table->string('series');
            $table->string('recomendaciones');
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
        Schema::dropIfExists('plan_entrenamiento');
    }
}
