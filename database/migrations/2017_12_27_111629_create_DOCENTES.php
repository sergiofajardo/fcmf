<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDOCENTES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DOCENTES', function (Blueprint $table) {
            $table->increments('id_docente');
            $table->string('nombres', 30)->nullable();
            $table->string('apellidos', 30)->nullable();
            $table->string('telefono', 10)->nullable();
            $table->string('titulo', 40)->nullable();
            $table->string('imagen', 300)->nullable();
            $table->string('estado', 10)->nullable();
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
        Schema::dropIfExists('DOCENTES');
    }
}
