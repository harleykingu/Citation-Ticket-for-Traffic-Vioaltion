<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->null();
            $table->string('tct_no');
            $table->string('driver_name')->nullable()->default('empty');
            $table->string('address')->nullable()->default('empty');
            $table->string('violation')->nullable()->default('empty');
            $table->string('plate_no')->nullable()->default('empty');
            $table->string('license_no')->nullable()->default('empty');
            $table->string('officer')->nullable()->default('empty');
            $table->string('remark')->nullable()->default('empty');
            $table->string('or_no')->nullable()->default('empty');
            $table->integer('amount')->nullable()->default('00');
            $table->date('or_date')->nullable()->default(null);
            $table->string('status')->nullable()->default('empty');
            $table->timestamps();
        });

        Schema::table('violations', function (Blueprint $table) {
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
        Schema::dropIfExists('violations');
    }
}
