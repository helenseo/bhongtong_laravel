<?php

use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function($table) {
            $table->increments('ticket_id');
            $table->integer('sale_id')->index();
            $table->integer('ticket_status_id')->index();
            $table->integer('user_id')->index();
            $table->longtext('detail')->nullable();
            $table->dateTime('started_date')->nullable();
            $table->dateTime('updated_date')->nullable();
            $table->integer('shop_id')->nullable()->index();
            $table->integer('cf_list_id')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');
    }

}