<?php

use Illuminate\Database\Migrations\Migration;

class CreateShopshavepaymentmethodsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops_have_payment_methods', function($table) {
            $table->increments('shop_pay_id');
            $table->longtext('value')->nullable();
            $table->integer('shop_id')->index();
            $table->integer('pay_method_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shops_have_payment_methods');
    }

}