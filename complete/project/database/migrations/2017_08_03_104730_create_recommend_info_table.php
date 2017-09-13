<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommendInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommend_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_id');
            $table->string('main_use_buy_category');
            $table->string('main_use_fleamarket_category');
            $table->string('main_use_seller_category');
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
        Schema::dropIfExists('recommend_infos');
    }
}
