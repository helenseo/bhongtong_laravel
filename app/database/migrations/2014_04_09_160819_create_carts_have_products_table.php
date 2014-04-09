<?php

use Illuminate\Database\Migrations\Migration;

class CreateCartshaveproductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts_have_products', function($table) {
            $table->increments('cart_have_products_id');
            $table->integer('cart_id')->index();
            $table->integer('product_id')->index();
            $table->decimal('product_total', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('carts_have_products');
    }

}