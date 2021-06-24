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
            /* $table->string('nombres')->nullable();
            $table->string('nombre_area_informe')->nullable(); */

            $table->enum('estado',['generado','enviado_jefatura','aprovado_jefatura','rechazado_jefatura','enviado_recursos','archivado'])->nullable();
            $table->text('respuesta')->nullable();

            $table->date('fecha_inicio_realizadas')->nullable();
            $table->date('fecha_fin_realizadas')->nullable();

            $table->integer('horas_total_realizadas')->nullable();
            $table->integer('horas_total_planificadas')->nullable();

            $table->date('fecha_inicio_planificadas')->nullable();
            $table->date('fecha_fin_planificadas')->nullable();


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
