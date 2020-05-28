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

            $table->bigInteger('mtb_id')->unsigned();
            $table->foreign('mtb_id')->references('id')->on('mtb')->onDelete('cascade');

            $table->bigInteger('ruta_id')->unsigned();
            $table->foreign('ruta_id')->references('id')->on('ruta')->onDelete('cascade');

            $table->bigInteger('gimnasio_id')->unsigned();
            $table->foreign('gimnasio_id')->references('id')->on('gimnasio')->onDelete('cascade');

            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();;
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
