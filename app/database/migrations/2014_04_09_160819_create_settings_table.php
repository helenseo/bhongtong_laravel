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
            $table->longtext('setting_value')->nullable();
            $table->dateTime('setting_updated')->nullable();
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