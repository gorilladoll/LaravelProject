<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_applys', function (Blueprint $table) {
            $table->integer('seller_id')->foreign('seller_id')->references('users')->on('id');
            $table->integer('surveyQ_id')->foreign('surveyQ_id')->references('survey_quastions')->on('id');
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
        Schema::dropIfExists('survey_applys');
    }
}
