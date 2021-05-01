<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('usuario_id')->unsigned();
            $table->string('nombres');
            $table->string('nombre_area_informe')->nullable();

            $table->string('estado')->nullable();
            $table->text('respuesta')->nullable();

            $table->date('fecha_inicio_realizadas');
            $table->date('fecha_fin_realizadas');

            $table->integer('horas_total_realizadas');
            $table->integer('horas_total_planificadas');

            $table->date('fecha_inicio_planificadas');
            $table->date('fecha_fin_planificadas');


            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informes');
    }
}
