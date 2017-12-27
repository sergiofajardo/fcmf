<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspaciosFisicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ESPACIOS_FISICOS', function (Blueprint $table) {
            $table->increments('id_espacio_fisico');
            $table->integer('id_facultad')->unsigned();
            $table->string('tipo', 30)->nullable();
            $table->string('ubicacion', 300)->nullable();
            $table->string('estado',10)->nullable();
            $table->string('usuario_creacion',20);
            $table->string('usuario_modificacion',20);
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
        Schema::dropIfExists('ESPACIOS_FISICOS');
    }
}
