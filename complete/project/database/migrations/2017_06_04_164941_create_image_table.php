<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('images',function(Blueprint $table){
          $table->increments('id');
          $table->string('image_category');
          $table->string('filename');
          $table->integer('board_id')->foreign('board_id')->reference('boards')->on('id')->nullable();
          $table->integer('goods_id')->foreign('goods_id')->reference('goods_id')->on('id')->nullable();
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
        Schema::dropIfExists('images');
    }
}
