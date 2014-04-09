<?php

use Illuminate\Database\Migrations\Migration;

class CreateShopshaveimagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops_have_images', function($table) {
            $table->increments('shop_img_id');
            $table->integer('shop_id')->index();
            $table->integer('image_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shops_have_images');
    }

}