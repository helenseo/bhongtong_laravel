<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsertypesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_types', function($table) {
            $table->increments('user_type_id');
            $table->string('user_type', 100)->nullable();
            $table->string('rate', 45)->nullable();
            $table->integer('charge_period_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_types');
    }

}