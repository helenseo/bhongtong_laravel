<?php

use Illuminate\Database\Migrations\Migration;

class CreateTicketstatusesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_statuses', function($table) {
            $table->increments('ticket_status_id');
            $table->string('ticket_status_type', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ticket_statuses');
    }

}