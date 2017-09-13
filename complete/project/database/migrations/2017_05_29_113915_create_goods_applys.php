<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsApplys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //판매자 신청시 상품 등록
        Schema::create('goods_applys', function (Blueprint $table) {
            $table->integer('th_id')->foreign('th_id')->references('flea_th')->on('id');
            //회차별 고유번호 외래키
            $table->integer('goods_id')->foreign('goods_id')->references('goods')->on('id');
            //마이샵 고유번호의 외래키
            $table->integer('user_id')->foreign('user_id')->references('users')->on('id');
            //회원 고유번호와 연동해야됨

            $table->integer('sales');
            $table->integer('price');
            $table->integer('quantity');
        });
//        Schema::create('users', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('email')->nullable(false);
//            $table->string('password')->nullable(false);
//            $table->string('attention_rocation')->nullable(true);
//            $table->string('own_flea')->nullable(false);
//            $table->string('nick_name')->nullable(false);
//            $table->string('name')->nullable(false);
//            $table->string('phone')->nullable(false);
//            $table->string('age')->nullable(false);
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('goods_applys');
        //Schema::dropIfExists('users');
    }
}
