<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); //어떤 유저가 이걸 가지고 있는지
            $table->string('plan_name'); //배치도 이름
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
        Schema::dropIfExists('block_plans');
    }
}
