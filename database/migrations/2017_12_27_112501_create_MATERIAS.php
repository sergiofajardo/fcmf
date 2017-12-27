<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMATERIAS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MATERIAS', function (Blueprint $table) {
            $table->increments('id_materia');
            $table->integer('id_carrera')->unsigned();
            $table->string('nivel',10)->nullable();
            $table->string('estado',10)->nullable();
            $table->string('nombre',50)->nullable();
            $table->string('usuario_creacion',20)->nullable();
            $table->string('usuario_modificacion',20)->nullable();
            $table->foreign('id_carrera')->references('id_carrera')->on('carreras');
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
        Schema::dropIfExists('MATERIAS');
    }
}
