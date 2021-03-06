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
        Schema::create('faculties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',150)->unique();
            $table->string('phone',10)->nullable();
            $table->string('address',150)->nullable();
            $table->string('image',300)->nullable();
            $table->string('user_create',50)->nullable();
            $table->string('user_update',50)->nullable();
            $table->string('mission',300)->nullable();
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
        Schema::dropIfExists('faculties');
    }
}
