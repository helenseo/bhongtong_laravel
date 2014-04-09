<?php

use Illuminate\Database\Migrations\Migration;

class CreateClassifiedlistsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classified_lists', function($table) {
            $table->increments('cf_list_id');
            $table->string('cf_name', 45)->nullable();
            $table->integer('shop_id')->index();
            $table->longtext('description')->nullable();
            $table->dateTime('added_date')->nullable();
            $table->dateTime('update_date')->nullable();
            $table->dateTime('removed_date')->nullable();
            $table->integer('views')->nullable();
            $table->integer('likes')->nullable();
            $table->integer('rating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classified_lists');
    }

}