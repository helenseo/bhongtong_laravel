<?php

use Illuminate\Database\Migrations\Migration;

class CreateBrowsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('browsers', function($table) {
            $table->increments('browser_id');
            $table->string('browser_name', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('browsers');
    }

}