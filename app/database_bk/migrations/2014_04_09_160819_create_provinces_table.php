<?php

use Illuminate\Database\Migrations\Migration;

class CreateProvincesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function($table) {
            $table->increments('province_id');
            $table->string('province_name', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('provinces');
    }

}