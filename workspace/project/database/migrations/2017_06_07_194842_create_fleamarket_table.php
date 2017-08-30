<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFleamarketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleamarkets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('host_id')->foreign('host_id')->references('users')->on('id');
            $table->string('explain'); // 설명
            $table->string('flea_name');
            $table->string('image_name'); // 대표 이미지 파일명
            $table->string('location');   // 지역
            $table->string('address');   // 지역
            $table->string('coordinate1');   // 좌표1
            $table->string('coordinate2');   // 좌표2
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
        Schema::dropIfExists('fleamarkets');
    }
}
