<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function($table) {
            $table->increments('order_id');
            $table->integer('user_id')->index();
            $table->string('order_status', 10)->nullable();
            $table->dateTime('order_added_date')->nullable();
            $table->dateTime('order_update_date')->nullable();
            $table->integer('product_id')->index();
            $table->integer('shop_ship_id')->index();
            $table->decimal('amount', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }

}