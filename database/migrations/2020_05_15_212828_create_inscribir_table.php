<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscribirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscribir', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('corredor_id')->unsigned();
            $table->foreign('corredor_id')->references('id')->on('corredor')->onDelete('cascade');


            $table->bigInteger('carrera_id')->unsigned();
            $table->foreign('carrera_id')->references('id')->on('carrera')->onDelete('cascade');
            $table->string('comprobante');
            $table->string('metodoPago');
            $table->string('banco');
            $table->string('fecha');
            $table->string('descripcion');
            $table->string('monto');
            $table->string('referencia');
            $table->boolean('estatus')->default(1);
            $table->boolean('estatus_corredor')->default(1);
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
        Schema::dropIfExists('inscribir');
    }
}
