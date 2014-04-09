<?php

use Illuminate\Database\Migrations\Migration;

class CreateDeliversTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivers', function($table) {
            $table->increments('deliver_id');
            $table->string('deliver_detail', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('delivers');
    }

}