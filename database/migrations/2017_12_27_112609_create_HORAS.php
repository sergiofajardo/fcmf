<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHORAS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HORAS', function (Blueprint $table) {
            $table->increments('id_hora');
            $table->string('desde',10)->nullable();
            $table->string('hasta',10)->nullable();
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
        Schema::dropIfExists('HORAS');
    }
}
