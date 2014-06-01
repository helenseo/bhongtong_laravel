<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsershavepaymentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_have_payments', function($table) {
            $table->increments('user_pay_id');
            $table->integer('user_id')->index();
            $table->integer('pay_method_id')->index();
            $table->text('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_have_payments');
    }

}