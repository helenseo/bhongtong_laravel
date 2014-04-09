<?php

use Illuminate\Database\Migrations\Migration;

class CreateOsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('os', function($table) {
            $table->increments('os_id');
            $table->string('os_name', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('os');
    }

}