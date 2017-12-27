<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHORARIOS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HORARIOS', function (Blueprint $table) {
            $table->increments('id_horario');
            $table->integer('id_espacio_fisico')->unsigned();
            $table->integer('id_periodo_ciclo')->unsigned();
            $table->integer('id_dia')->unsigned();
            $table->integer('id_hora')->unsigned();
            $table->integer('id_materia_paralelo')->unsigned();
            $table->string('observacion',250)->nullable();
            $table->string('estado',10)->nullable();
            $table->string('usuario_creacion',20)->nullable();
            $table->string('usuario_modificacion',20)->nullable();
            $table->foreign('id_espacio_fisico')->references('id_espacio_fisico')->on('espacios_fisicos');
            $table->foreign('id_periodo_ciclo')->references('id_periodo_ciclo')->on('periodo_ciclo');
            $table->foreign('id_dia')->references('id_dia')->on('dias');
            $table->foreign('id_hora')->references('id_hora')->on('horas');
            $table->foreign('id_materia_paralelo')->references('id_materia_paralelo')->on('materia_paralelo');
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
        Schema::dropIfExists('HORARIOS');
    }
}
