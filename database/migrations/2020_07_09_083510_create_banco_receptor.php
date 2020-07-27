<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBancoReceptor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banco_receptor', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('banco_id')->unsigned();
            $table->foreign('banco_id')->references('id')->on('banco')->onDelete('cascade');

            $table->string('titular');
            $table->string('cedula');
            $table->string('cuenta');
            $table->string('nro_cuenta');
            $table->string('telefono');
            $table->string('correo');
            $table->string('logo')->nullable();




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
        Schema::dropIfExists('banco_receptor');
    }
}
