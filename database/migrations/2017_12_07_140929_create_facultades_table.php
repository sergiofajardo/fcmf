<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facultades', function (Blueprint $table) {
            $table->increments('id_facultad');
            $table->string('facultad',150)->unique();
            $table->string('telefono',10)->nullable();
            $table->string('direccion',150)->nullable();
            $table->string('logo',300)->nullable();
            $table->string('usuario_creacion',50)->nullable();
            $table->string('usuario_modificacion',50)->nullable();
            $table->string('mision',300)->nullable();
            $table->string('vision',300)->nullable();
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
        Schema::dropIfExists('facultades');
    }
}
