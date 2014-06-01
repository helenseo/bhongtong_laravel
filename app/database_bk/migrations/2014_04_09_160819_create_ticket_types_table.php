<?php

use Illuminate\Database\Migrations\Migration;

class CreateTickettypesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_types', function($table) {
            $table->increments('ticket_type_id');
            $table->string('ticket_type_name', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ticket_types');
    }

}