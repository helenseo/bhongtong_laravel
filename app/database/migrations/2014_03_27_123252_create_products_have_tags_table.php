<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductshavetagsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_have_tags', function($table) {
            $table->increments('products_tags_id');
            $table->integer('tag_id')->index();
            $table->integer('product_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products_have_tags');
    }

}