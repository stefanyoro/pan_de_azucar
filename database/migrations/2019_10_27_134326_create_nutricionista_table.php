<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNutricionistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutricionista', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('persona_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('persona')->onDelete('cascade');
            
            $table->string('grado_Instrucc');
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
        Schema::dropIfExists('nutricionista');
    }
}
