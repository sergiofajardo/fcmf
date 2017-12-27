<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMATERIAPARALELO extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MATERIA_PARALELO', function (Blueprint $table) {
            $table->increments('id_materia_paralelo');
            $table->integer('id_docente')->unsigned();
            $table->integer('id_materia')->unsigned();
            $table->integer('id_paralelo')->unsigned();
            $table->string('usuario_creacion',20)->nullable();
            $table->string('usuario_modificacion',20)->nullable();
            $table->foreign('id_docente')->references('id_docente')->on('docentes');
            $table->foreign('id_paralelo')->references('id_paralelo')->on('paralelo');
           
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
        Schema::dropIfExists('MATERIA_PARALELO');
    }
}
