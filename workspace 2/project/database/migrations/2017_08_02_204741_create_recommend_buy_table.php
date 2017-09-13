<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommendBuyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommend_buys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id');
            $table->integer('th_id');
            $table->integer('flea_id');
            $table->integer('seller_id');
            $table->integer('buyer_id');
            $table->integer('price');
            $table->integer('count');
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
        Schema::dropIfExists('recommend_buys');
    }
}
