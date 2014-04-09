<?php

use Illuminate\Database\Migrations\Migration;

class CreateBrowsinghistoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('browsing_histories', function($table) {
            $table->increments('bs_history_id');
            $table->integer('user_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('content_id')->nullable();
            $table->integer('shop_id')->nullable();
            $table->dateTime('browsing_date')->nullable();
            $table->integer('province_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('os_id')->index();
            $table->integer('ref_id')->index();
            $table->integer('browser_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('browsing_histories');
    }

}