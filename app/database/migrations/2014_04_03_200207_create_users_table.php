<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function($table) {
            $table->increments('user_id');
            $table->string('username', 100)->nullable();
            $table->string('firstname', 255)->nullable();
            $table->string('lastname', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->text('address')->nullable();
            $table->integer('province_id')->index();
            $table->integer('user_type_id')->index();
            $table->string('email', 100)->nullable();
            $table->integer('tel')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('sale_id')->nullable();
            $table->decimal('points', 10, 2)->nullable();
            $table->dateTime('removed_date')->nullable();
            $table->boolean('is_banned')->nullable();
            $table->boolean('is_approved')->nullable();
            $table->dateTime('registed_date')->nullable();
            $table->integer('setting_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}