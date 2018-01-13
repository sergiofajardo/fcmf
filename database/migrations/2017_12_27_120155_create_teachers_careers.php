<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersCareers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_careers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned();
            $table->integer('career_id')->unsigned();
             $table->string('user_create',20)->nullable();
            $table->string('user_update',20)->nullable();
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('career_id')->references('id')->on('careers');
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
        Schema::dropIfExists('teachers_careers');
    }
}
