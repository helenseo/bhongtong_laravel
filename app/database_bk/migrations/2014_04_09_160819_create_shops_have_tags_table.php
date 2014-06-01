<?php

use Illuminate\Database\Migrations\Migration;

class CreateShopshavetagsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops_have_tags', function($table) {
            $table->increments('shops_tags_id');
            $table->integer('shop_id')->index();
            $table->integer('tag_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shops_have_tags');
    }

}