<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGimnasioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gimnasio', function (Blueprint $table) {
            $table->bigInteger('id_ejercicio')->unsigned();
            $table->foreign('id_ejercicio')->references('id')->on('ejercicios')->onDelete('cascade');
            $table->bigIncrements('id');
            $table->string('zona');
            $table->string('series')->nullable();
            $table->string('repeticiones')->nullable();
            $table->string('peso')->nullable();
            $table->string('dias');
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
        Schema::dropIfExists('gimnasio');
    }
}
