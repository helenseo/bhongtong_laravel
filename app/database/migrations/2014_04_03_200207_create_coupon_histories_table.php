<?php

use Illuminate\Database\Migrations\Migration;

class CreateCouponhistoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_histories', function($table) {
            $table->increments('coupon_history_id');
            $table->integer('user_id')->nullable();
            $table->dateTime('buying_date')->nullable();
            $table->dateTime('used_date')->nullable();
            $table->integer('coupon_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coupon_histories');
    }

}