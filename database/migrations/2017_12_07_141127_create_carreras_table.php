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
        Schema::create('careers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
             $table->integer('faculty_id')->unsigned();
            $table->string('phone',10)->nullable();
            $table->string('address',150)->nullable();
            $table->string('image',300)->nullable();
            $table->string('user_create',50)->nullable();
            $table->string('user_update',50)->nullable();
            $table->string('mission',500)->nullable();
            $table->string('vision',800)->nullable();
            $table->string('state',10)->nullable();
            $table->foreign('faculty_id')->references('id')->on('faculties');
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
        Schema::dropIfExists('careers');
    }
}
