<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFleaAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //플리마켓 정산
        Schema::create('flea_accounts', function (Blueprint $table) {
            $table->integer('th_id')->foreign('th_id')->references('flea_th')->on('id');
            //회차별 고유번호 외래키
            $table->integer('seller_id')->foreign('seller_id')->references('users')->on('id');
            //회원 고유번호와 연동해야됨

            $table->integer('account');
            //점포별로 얼마나 팔렸는지
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
        Schema::dropIfExists('flea_accounts');
    }
}
