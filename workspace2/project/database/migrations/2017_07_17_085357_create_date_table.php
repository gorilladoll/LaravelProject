<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('dates',function(Blueprint $table){
          $table->increments('id');
          $table->integer('user_id')->foreign('user_id')->reference('user')->on('id');
          $table->string('title');
          $table->string('start');
          $table->string('end');
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
        Schema::dropIfExists('dates');
    }
}
