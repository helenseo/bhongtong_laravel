<?php

use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function($table) {
            $table->increments('setting_id');
            $table->string('setting_name', 45)->nullable();
            $table->string('setting_value', 45)->nullable();
            $table->string('setting_updated', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }

}