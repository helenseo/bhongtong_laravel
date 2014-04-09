<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsershaveshopsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_have_shops', function($table) {
            $table->increments('user_shop_id');
            $table->integer('user_id')->index();
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
        Schema::drop('users_have_shops');
    }

}