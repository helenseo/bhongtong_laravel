<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_table', function($table) {
            $table->increments('user_id');
            $table->string('password', 64)->nullable();
            $table->string('firstname', 50)->nullable();
            $table->string('lastname', 50)->nullable();
            $table->string('address', 500)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('tel', 10)->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('user_table');
    }

}
