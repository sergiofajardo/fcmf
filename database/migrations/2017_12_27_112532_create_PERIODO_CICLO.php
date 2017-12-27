<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePERIODOCICLO extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PERIODO_CICLO', function (Blueprint $table) {
            $table->increments('id_periodo_ciclo');
            $table->string('anio',4)->nullable();
            $table->string('ciclo',8)->nullable();
            $table->string('estado',10)->nullable();
            $table->string('usuario_creacion',20)->nullable();
            $table->string('usuario_modificacion',20)->nullable();
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
        Schema::dropIfExists('PERIODO_CICLO');
    }
}
