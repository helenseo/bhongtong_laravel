<?php

use Illuminate\Database\Migrations\Migration;

class CreateForgotpasstokenTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forgot_pass_token', function($table) {
            $table->increments('f_pw_id');
            $table->integer('user_id');
            $table->string('token', 100);
            $table->dateTime('added_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forgot_pass_token');
    }

}