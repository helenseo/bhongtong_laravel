<?php

use Illuminate\Database\Migrations\Migration;

class CreateMessageshaveimagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_have_images', function($table) {
            $table->increments('message_image_id');
            $table->integer('message_id')->index();
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
        Schema::drop('messages_have_images');
    }

}