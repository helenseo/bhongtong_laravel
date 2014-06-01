<?php

use Illuminate\Database\Migrations\Migration;

class CreateTransactiondetailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function($table) {
            $table->increments('trans_detail_id');
            $table->longtext('trans_detail')->nullable();
            $table->integer('trans_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaction_details');
    }

}