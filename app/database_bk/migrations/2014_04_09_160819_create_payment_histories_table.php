<?php

use Illuminate\Database\Migrations\Migration;

class CreatePaymenthistoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_histories', function($table) {
            $table->increments('payment_histories_id');
            $table->integer('user_id')->index();
            $table->integer('shop_pay_id')->index();
            $table->integer('user_pay_id')->index();
            $table->integer('order_id')->index();
            $table->dateTime('payment_date')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payment_histories');
    }

}