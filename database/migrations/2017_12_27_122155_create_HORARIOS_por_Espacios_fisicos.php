<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHORARIOSporEspaciosfisicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules_physicals_spaces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('physical_space_id')->unsigned();
            $table->integer('period_cycle_id')->unsigned();
            $table->integer('day_id')->unsigned();
            $table->integer('hour_id')->unsigned();
            $table->integer('teacher_career_id')->unsigned();
            $table->string('observation',250)->nullable();
            $table->string('reason',250)->nullable();
            $table->string('state',10)->nullable();
            $table->string('user_create',20)->nullable();
            $table->string('user_update',20)->nullable();
            $table->foreign('physical_space_id')->references('id')->on('physical_spaces');
            $table->foreign('period_cycle_id')->references('id')->on('period_cycles');
            $table->foreign('day_id')->references('id')->on('days');
            $table->foreign('hour_id')->references('id')->on('hours');
            $table->foreign('teacher_career_id')->references('id')->on('teachers_careers');
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
        Schema::dropIfExists('schedules_physicals_spaces');
    }
}
