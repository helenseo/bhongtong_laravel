<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductshavecategoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_have_categories', function($table) {
            $table->increments('product_cat_id');
            $table->integer('product_id')->index();
            $table->integer('cat_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products_have_categories');
    }

}