<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuylistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         //
         Schema::create('buylists',function(Blueprint $table){
           $table->increments('bid');
           $table->string('bname');
           $table->string('bprice');
           $table->string('bseller');
           $table->string('bimg');
           $table->string('bbuyer');
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
         Schema::dropIfExists('buylists');
     }
}
