<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_accounts', function (Blueprint $table) {
            $table->integer('th_id')->foreign('th_id')->references('flea_th')->on('id');
            //회차별 고유번호 외래키
            $table->integer('user_id')->foreign('user_id')->references('users')->on('id');
            //회원 고유번호와 연동해야됨

            $table->integer('goods_id')->foreign('goods_id')->references('goods')->on('id');
            $table->integer('result');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_accounts');
    }
}
