<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformesRealizadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes_realizadas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_informe_realizadas')->unsigned();


            $table->string('nombre_rubro_realizadas')->nullable();


            $table->text('descripcion_rubro_realizadas');

            $table->integer('horas_solas_realizadas');

            $table->timestamps();



            $table->foreign('id_informe_realizadas')->references('id')->on('informes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informes_realizadas');
    }
}
