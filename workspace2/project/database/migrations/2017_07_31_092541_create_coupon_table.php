<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('coupon',function(Blueprint $table){
            $table->increments('id');    
            $table->string('user_id');     //쿠폰 소유자 ID
            $table->string('coupon_name');  //쿠폰 이름
            $table->string('coupon_type');  //판매자 쿠폰인지 구매자 쿠폰인지
        });
    }

    public function down()
    {
        //
        Schema::dropIfExists('coupon');
    }
}
