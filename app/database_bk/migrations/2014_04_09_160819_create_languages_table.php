<?php

use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function($table) {
            $table->increments('lang_id');
            $table->string('lang_code', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('languages');
    }

}