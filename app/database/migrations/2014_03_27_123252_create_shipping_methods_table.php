<?php

use Illuminate\Database\Migrations\Migration;

class CreateShippingmethodsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_methods', function($table) {
            $table->increments('ship_method_id');
            $table->string('ship_method_name', 100)->nullable();
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
        Schema::drop('shipping_methods');
    }

}