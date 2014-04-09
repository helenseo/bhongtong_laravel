<?php

use Illuminate\Database\Migrations\Migration;

class CreateCredithistoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_histories', function($table) {
            $table->increments('credit_histories_id');
            $table->integer('credit_method_id')->index();
            $table->string('credit_histories_status', 10)->nullable();
            $table->integer('shop_pay_id')->nullable();
            $table->integer('user_pay_id')->nullable();
            $table->integer('shop_id')->index();
            $table->integer('user_id')->index();
            $table->integer('payment_histories_id')->index();
            $table->dateTime('datetime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('credit_histories');
    }

}