<?php

use Illuminate\Database\Migrations\Migration;

class CreateCreditmethodsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_methods', function($table) {
            $table->increments('credit_method_id');
            $table->text('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('credit_methods');
    }

}