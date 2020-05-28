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
            $table->bigIncrements('id');
            $table->string('zona');
            $table->string('ejercicio');
            $table->string('series');
            $table->string('repeticiones');
            $table->string('peso');
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
