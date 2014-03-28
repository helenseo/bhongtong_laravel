<?php

use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function($table) {
            $table->increments('trans_id');
            $table->integer('user_id')->nullable();
            $table->dateTime('trans_date')->nullable();
            $table->string('trans_type', 45)->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('sale_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }

}