<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 댓글아이디(기본키)
        // 유저아이디
        // 물품아이디(외래키)
        // 댓글내용
        // 평점
        Schema::create('goods_comments',function(Blueprint $table){
          $table->increments('id');                                                             // 댓글아이디(기본키)
            $table->integer('user_id');                                                         // 유저아이디
            $table->integer('goods_id')->foreign('goods_id')->references('goods')->on('id');    // 물품아이디(외래키)
            $table->text('text');                                                               // 댓글내용
            $table->float('starpoint');                                                         // 평점
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
        Schema::dropIfExists('goods_comments');
    }
}
