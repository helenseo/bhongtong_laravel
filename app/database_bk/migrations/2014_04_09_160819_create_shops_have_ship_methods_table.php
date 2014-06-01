<?php

use Illuminate\Database\Migrations\Migration;

class CreateShopshaveshipmethodsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops_have_ship_methods', function($table) {
            $table->increments('shop_ship_id');
            $table->integer('shop_id')->index();
            $table->integer('ship_method_id')->nullable();
            $table->decimal('rate', 10, 2)->nullable();
            $table->text('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shops_have_ship_methods');
    }

}