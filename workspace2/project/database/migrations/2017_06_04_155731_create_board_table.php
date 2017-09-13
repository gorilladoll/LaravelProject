<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('boards',function(Blueprint $table){
          $table->increments('id');
          $table->string('content');
          $table->string('myshop_id')->foreign('myshop_id')->reference('myshops')->on('id');
          $table->string('board_id')->foreign('board_id')->reference('boards')->on('id')->nullable();
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
        Schema::dropIfExists('boards');
    }
}
