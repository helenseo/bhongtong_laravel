<?php

use Illuminate\Database\Migrations\Migration;

class CreateAuctionhavetagsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction_have_tags', function($table) {
            $table->increments('auction_tags_id');
            $table->integer('autions_id')->index();
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
        Schema::drop('auction_have_tags');
    }

}