<?php

use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function($table) {
            $table->increments('coupon_id');
            $table->dateTime('started_date')->nullable();
            $table->dateTime('ended_date')->nullable();
            $table->string('coupon_code', 45)->nullable();
            $table->integer('shop_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coupons');
    }

}