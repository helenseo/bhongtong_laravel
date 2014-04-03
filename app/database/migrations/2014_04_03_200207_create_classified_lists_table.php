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
            $table->string('added_date', 45)->nullable();
            $table->string('update_date', 45)->nullable();
            $table->string('removed_date', 45)->nullable();
            $table->string('views', 45)->nullable();
            $table->string('likes', 45)->nullable();
            $table->string('rating', 45)->nullable();
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