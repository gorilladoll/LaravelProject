<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerApplys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //판매자 신청 테이블
        Schema::create('seller_applys', function (Blueprint $table) {
            $table->integer('th_id')->foreign('th_id')->references('flea_th')->on('id');
            //회차별 고유번호 외래키
            $table->integer('user_id')->foreign('user_id')->references('users')->on('id');
            //마이샵 고유번호의 외래키

            $table->boolean('accept');
            $table->string('booth_name');
            $table->string('category');
            
            $table->string('start_day'); //희망날짜
            $table->string('end_day');
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
        Schema::dropIfExists('seller_applys');
    }
}
