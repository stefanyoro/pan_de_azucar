<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaAlimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_alimento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('plan_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('plan_alimenticio')->onDelete('cascade');
            $table->string('nombre');
            $table->string('racion');
            $table->string('medidas');
            $table->string('hora');
            $table->string('dia');
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
        Schema::dropIfExists('lista_alimento');
    }
}
