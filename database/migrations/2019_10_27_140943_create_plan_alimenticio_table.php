<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanAlimenticioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_alimenticio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nutri_id')->unsigned();
            $table->foreign('nutri_id')->references('id')->on('nutricionista')->onDelete('cascade');


            $table->bigInteger('corredor_id')->unsigned();
            $table->foreign('corredor_id')->references('id')->on('corredor')->onDelete('cascade');

            $table->string('preinscripcion');
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
        Schema::dropIfExists('plan_alimenticio');
    }
}
