<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrdershaveproductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_have_products', function($table) {
            $table->increments('order_product_id');
            $table->integer('product_id')->index();
            $table->integer('order_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders_have_products');
    }

}