<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductcategoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function($table) {
            $table->increments('cat_id');
            $table->string('cat_name', 255)->nullable();
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
        Schema::drop('product_categories');
    }

}