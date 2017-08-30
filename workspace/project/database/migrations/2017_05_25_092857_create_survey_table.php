<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 플리마켓 개최시 설문조사 질문을 넣는 테이블
        Schema::create('survey_quastions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('th_id');
            $table->string('text');
            $table->timestamps();
        });
        // 플리마켓 개최시 설문조사 질문의 보기를 작성하는 테이블
        // 특정 테이블의 id에 parent_id가 기입되어 있으면 보기식으로 판별
        Schema::create('survey_examples', function (Blueprint $table) {
            $table->integer('table_id');
            $table->integer('parent_id');
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
        Schema::dropIfExists('survey_quastions');
        Schema::dropIfExists('survey_examples');
    }
}
