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
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card',10)->unique();
            $table->string('name', 30)->nullable();
            $table->string('last_name', 30)->nullable();
            $table->string('phone', 10)->nullable();
            $table->string('degree', 40)->nullable();
            $table->string('image', 300)->nullable();
            $table->string('state', 10)->nullable();
            $table->string('user_create',20)->nullable();
            $table->string('user_update',20)->nullable();
            
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
        Schema::dropIfExists('teachers');
    }
}
