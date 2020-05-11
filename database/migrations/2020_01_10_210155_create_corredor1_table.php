<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorredor1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corredor1', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nacionalidad');
            $table->string('tipo_doc');
            $table->char('sexo')->nullable();
            $table->string('numero_doc')->nullable();
            $table->string('nombre');
            $table->string('apellido')->nullable();
            $table->date('fecha_nac')->nullable();
            $table->string('tipo_corredor')->nullable();
            $table->string('direccion')->nullable();
            $table->string('correo')->unique();
            $table->string('edad');
            $table->string('peso');
            $table->string('estatura');
            $table->string('contraseña0');
            $table->string('contraseña1');
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
        Schema::dropIfExists('corredor1');
    }
}
