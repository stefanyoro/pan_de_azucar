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
            $table->bigInteger('corredor_id')->unsigned();
            $table->string('nombre_plan');
            $table->date('fecha');
            $table->string('descripcion')->nullable();
            $table->unsignedInteger('id_leche')->nullable();
            $table->bigInteger('porcion_leche')->nullable();
            $table->string('equivalente_leche')->nullable();
            $table->string('dias_leche')->nullable();
            $table->unsignedInteger('id_carnes')->nullable();
            $table->bigInteger('porcion_carne')->nullable();
            $table->string('equivalente_carne')->nullable();
            $table->string('dias_carne')->nullable();
            $table->unsignedInteger('id_legumbres')->nullable();
            $table->bigInteger('porcion_legumbre')->nullable();
            $table->string('equivalente_legumbre')->nullable();
            $table->string('dias_legumbre')->nullable();
            $table->unsignedInteger('id_hortalizas')->nullable();
            $table->bigInteger('porcion_hortaliza')->nullable();
            $table->string('equivalente_hortaliza')->nullable();
            $table->string('dias_hortaliza')->nullable();
            $table->unsignedInteger('id_frutas')->nullable();
            $table->bigInteger('porcion_fruta')->nullable();
            $table->string('equivalente_fruta')->nullable();
            $table->string('dias_fruta')->nullable();
            $table->unsignedInteger('id_cereales')->nullable();
            $table->bigInteger('porcion_cereal')->nullable();
            $table->string('equivalente_cereal')->nullable();
            $table->string('dias_cereal')->nullable();
            $table->unsignedInteger('id_aceites')->nullable();
            $table->bigInteger('porcion_aceite')->nullable();
            $table->string('equivalente_aceite')->nullable();
            $table->string('dias_aceite')->nullable();
            $table->boolean('status')->default(1);

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
