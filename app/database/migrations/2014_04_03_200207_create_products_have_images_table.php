<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductshaveimagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_have_images', function($table) {
            $table->increments('product_img_id');
            $table->integer('product_id')->index();
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
        Schema::drop('products_have_images');
    }

}