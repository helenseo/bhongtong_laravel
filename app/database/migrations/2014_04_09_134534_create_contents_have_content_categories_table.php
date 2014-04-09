<?php

use Illuminate\Database\Migrations\Migration;

class CreateContentshavecontentcategoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents_have_content_categories', function($table) {
            $table->increments('c_content_cat_id');
            $table->integer('content_id')->index();
            $table->integer('content_cat_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contents_have_content_categories');
    }

}