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
        Schema::create('physical_spaces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faculties_id')->unsigned();
            $table->string('type', 30)->nullable();
            $table->string('location', 300)->nullable();
            $table->string('state',10)->nullable();
            $table->string('user_create',20)->nullable();
            $table->string('user_update',20)->nullable();
            $table->string('name',40)->nullable();
            $table->foreign('faculties_id')->references('id')->on('faculties');
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
        Schema::dropIfExists('physical_spaces');
    }
}
