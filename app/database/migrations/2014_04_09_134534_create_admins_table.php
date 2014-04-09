<?php

use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function($table) {
            $table->increments('admin_id');
            $table->integer('level_id')->index();
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
        Schema::drop('admins');
    }

}