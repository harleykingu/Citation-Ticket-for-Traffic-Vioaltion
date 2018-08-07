<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJaywalkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaywalking', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned()->null();
          $table->integer('tct_no');
          $table->string('app_name')->nullable();
          $table->string('address')->nullable();
          $table->string('violation')->nullable();
          $table->string('app_date')->nullable();
          $table->string('officer')->nullable();
          $table->string('remark')->nullable();
          $table->string('or_no')->nullable();
          $table->integer('amount')->nullable();
          $table->date('or_date')->nullable();
          $table->string('status')->nullable();
          $table->timestamps();
        });

        Schema::table('jaywalking', function (Blueprint $table) {
          $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jaywalking');
    }
}
