<?php

use Illuminate\Database\Migrations\Migration;

class CreateContentcategoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_categories', function($table) {
            $table->increments('content_cat_id');
            $table->string('cat_name', 255)->nullable();
            $table->text('cat_description')->nullable();
            $table->integer('cat_parent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('content_categories');
    }

}