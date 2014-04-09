<?php

use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function($table) {
            $table->increments('cart_id');
            $table->dateTime('added_date')->nullable();
            $table->integer('user_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('carts');
    }

}