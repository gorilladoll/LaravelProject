<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('attention_location')->nullable(true);
            $table->string('own_flea')->nullable(false);
            $table->string('nick_name')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->integer('age')->nullable(false);
            $table->integer('mileage')->nullable(false);
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
        Schema::dropIfExists('users');
    }
}
