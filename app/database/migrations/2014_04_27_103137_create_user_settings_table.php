<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersettingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_settings', function($table) {
            $table->increments('users_setting_id');
            $table->string('users_setting_key', 255);
            $table->text('users_setting_value');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_settings');
    }

}