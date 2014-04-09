<?php

use Illuminate\Database\Migrations\Migration;

class CreateAdminlevelsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_levels', function($table) {
            $table->increments('level_id');
            $table->string('level_name', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_levels');
    }

}