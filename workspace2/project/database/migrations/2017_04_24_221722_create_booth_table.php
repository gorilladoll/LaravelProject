<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoothTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booths', function (Blueprint $table) {
            $table->increments('id');
            $table->string('booth_name')->nullable(false);
            $table->string('user_name')->nullable(false);
            $table->string('top')->nullable(false);
            $table->string('left')->nullable(false);
            $table->string('width')->nullable(false);
            $table->string('height')->nullable(false);
            $table->integer('user_id')->nullable(true);
            $table->string('type')->nullable(true); //부스인지 장애물인지 입구인지
            $table->string('value')->nullable(true); //장애물이나 입구면 벨류값
            $table->string('category')->nullable(true); //장애물이나 입구면 벨류값
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
        Schema::dropIfExists('booths');
    }
}
