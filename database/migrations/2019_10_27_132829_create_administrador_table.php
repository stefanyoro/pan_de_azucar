<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministradorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrador', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('persona_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('persona')->onDelete('cascade');
            
            $table->string('especialidad');
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
        Schema::dropIfExists('administrador');
    }
}
