<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id')->foreign('goods_id')->references('goods')->on('id');
            $table->integer('seller_id')->foreign('seller_id')->references('users')->on('id');
            $table->integer('sell_price');
            $table->integer('sell_count');
            $table->integer('th_id')->foreign('th_id')->references('flea_ths')->on('id');
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
        Schema::dropIfExists('lab_accounts');
    }
}
