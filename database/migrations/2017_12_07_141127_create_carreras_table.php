<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->increments('id_carrera');
            $table->string('carrera');
             $table->integer('id_facultad')->unsigned();
            $table->string('telefono',10);
            $table->string('direccion',150);
            $table->string('logo',300);
            $table->string('usuario_creacion',50);
            $table->string('usuario_modificacion',50);
            $table->string('mision',300);
            $table->string('vision',300);
            $table->string('estado',10)->nullable();
            $table->foreign('id_facultad')->references('id_facultad')->on('facultades');
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
        Schema::dropIfExists('carreras');
    }
}
