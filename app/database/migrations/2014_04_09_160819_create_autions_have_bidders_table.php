<?php

use Illuminate\Database\Migrations\Migration;

class CreateAutionshavebiddersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autions_have_bidders', function($table) {
            $table->increments('auctions_bidders_id');
            $table->integer('autions_id')->index();
            $table->integer('user_id')->index();
            $table->dateTime('bidder_datetime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('autions_have_bidders');
    }

}