<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FleaTh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //회차별 플리마켓 테이블
        Schema::create('flea_ths', function (Blueprint $table) {
//            $table->increments('id');
//            //$table->foreign('flea_id')->references('fleamarkets')->on('id');
//            $table->integer('flea_id');
//            //플리마켓 고유번호 외래키
//            $table->timestamps();
//            $table->integer('booth_quantity');
//            $table->string('end_date');
//            $table->integer('entry_fee');
//            $table->string('text');
//            $table->string('topic');
//            $table->integer('th');
//            $table->string('start_time');
//            $table->string('end_time');
//            $table->integer('block_plan');

            //$table->foreign('flea_id')->references('fleamarkets')->on('id');
            $table->increments('id');
            $table->integer('flea_id');
            //플리마켓 고유번호 외래키
            $table->timestamps();
            $table->integer('booth_quantity'); //부스 수
            $table->string('start_year_month');
            $table->string('start_day');
            $table->string('end_year_month');
            $table->string('end_day');
            $table->string('start_time');
            $table->string('end_time');
            $table->integer('entry_fee');      //입장료
            $table->integer('booth_fee');      //부스비
            $table->integer('commission');     //퍼센트
            $table->string('text');
            $table->string('topic');
            $table->integer('th');
            $table->string('recruit_start_time'); //모집 시간
            $table->string('recruit_end_time');
            $table->integer('block_plan');
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
        Schema::dropIfExists('flea_ths');

    }
}
