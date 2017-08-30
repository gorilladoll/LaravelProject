<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyshopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('myshops',function(Blueprint $table){
          $table->increments('id');
          $table->string('title');
          $table->string('introduce');
          $table->string('jsonfile');
          $table->integer('max_sellpoint')->nullable();
          $table->integer('min_sellpoint')->nullable();
          $table->integer('join_count')->nullable();
          $table->boolean('ticket')->nullable();
          $table->integer('user_id')->foreign('user_id')->reference('users')->on('id');
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
        //
        Schema::dropIfExists('myshops');
    }
}
