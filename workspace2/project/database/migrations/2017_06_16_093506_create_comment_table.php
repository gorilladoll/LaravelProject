<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flea_th_id')->foreign('flea_th_id')->references('flea_ths')->on('id'); // 어느 플리마켓의 몇회차의 댓글인지
            $table->integer('user_id');                                                             // 설명
            $table->text('text');                                                                   // 댓글 내용
            $table->string('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
