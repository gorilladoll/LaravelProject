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
          $table->string('lab_name');
          $table->string('background_img');
          $table->string('left_img');
          $table->string('center_img');
          $table->string('right_img');
          $table->string('font_style');
          $table->string('font_size');
          $table->string('font_color');
          $table->string('font_weight');
          $table->integer('max_sellpoint')->nullable();
          $table->integer('min_sellpoint')->nullable();
          $table->integer('join_count')->nullable();
          $table->boolean('ticket')->nullable();
          $table->integer('user_id')->foreign('user_id')->reference('userㄴ')->on('id');
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
