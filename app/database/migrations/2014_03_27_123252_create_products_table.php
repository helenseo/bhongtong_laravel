<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function($table) {
            $table->increments('product_id');
            $table->string('product_name', 255)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->dateTime('added_date')->nullable();
            $table->integer('shop_id')->index();
            $table->text('product_detail')->nullable();
            $table->dateTime('removed_date')->nullable();
            $table->boolean('is_banned')->nullable();
            $table->boolean('is_approved')->nullable();
            $table->integer('product_total')->nullable();
            $table->integer('tax_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }

}