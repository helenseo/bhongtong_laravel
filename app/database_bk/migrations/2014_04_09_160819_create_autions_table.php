<?php

use Illuminate\Database\Migrations\Migration;

class CreateAutionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autions', function($table) {
            $table->increments('autions_id');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->integer('starting_price')->nullable();
            $table->integer('final_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('autions');
    }

}