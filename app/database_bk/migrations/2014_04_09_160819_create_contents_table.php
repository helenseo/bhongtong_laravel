<?php

use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function($table) {
            $table->increments('content_id');
            $table->integer('shop_id')->index();
            $table->string('content_title', 45)->nullable();
            $table->longtext('content_description')->nullable();
            $table->dateTime('added_date')->nullable();
            $table->dateTime('updated_date')->nullable();
            $table->integer('views')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('likes')->nullable();
            $table->dateTime('removed_date')->nullable();
            $table->boolean('is_banned')->nullable();
            $table->boolean('is_approved')->nullable();
            $table->integer('lang_id')->nullable()->index();
            $table->integer('user_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contents');
    }

}