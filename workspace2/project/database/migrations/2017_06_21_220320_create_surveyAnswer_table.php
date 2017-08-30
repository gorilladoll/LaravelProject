<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('th_id')->foreign('th_id')->references('flea_ths')->on('id');
            $table->integer('user_id')->foreign('user_id')->references('users')->on('id');
            $table->integer('q_id')->foreign('q_id')->references('survey_quastions')->on('id');
            $table->integer('answer_id')->foreign('answer_id')->references('survey_quastions')->on('id');
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
        Schema::dropIfExists('survey_answers');
    }
}
