<?php

use Illuminate\Database\Migrations\Migration;

class CreatePaymentmethodsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function($table) {
            $table->increments('pay_method_id');
            $table->string('method_name', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payment_methods');
    }

}