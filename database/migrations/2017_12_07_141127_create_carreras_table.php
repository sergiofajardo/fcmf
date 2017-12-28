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
            $table->string('name');
             $table->integer('faculty_id')->unsigned();
            $table->string('phone',10);
            $table->string('address',150);
            $table->string('image',300);
            $table->string('user_create',50);
            $table->string('user_update',50);
            $table->string('mission',300);
            $table->string('vision',300);
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
