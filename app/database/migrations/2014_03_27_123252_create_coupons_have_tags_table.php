<?php

use Illuminate\Database\Migrations\Migration;

class CreateCouponshavetagsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons_have_tags', function($table) {
            $table->increments('coupons_tags_id');
            $table->integer('tag_id')->index();
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
        Schema::drop('coupons_have_tags');
    }

}