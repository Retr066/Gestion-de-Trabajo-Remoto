<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformesPlanificadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes_planificadas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_informe_planificadas')->unsigned();



            $table->string('nombre_rubro_planificadas')->nullable();

            $table->text('descripcion_rubro_planificadas');

            $table->integer('horas_solas_planificas');

            $table->timestamps();


            $table->foreign('id_informe_planificadas')->references('id')->on('informes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informes_planificadas');
    }
}
