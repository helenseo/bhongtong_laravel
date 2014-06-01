<?php

use Illuminate\Database\Migrations\Migration;

class CreateContentshavetagsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents_have_tags', function($table) {
            $table->increments('contents_tags_id');
            $table->integer('content_id')->index();
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
        Schema::drop('contents_have_tags');
    }

}