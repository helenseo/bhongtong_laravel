<?php

use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function($table) {
            $table->increments('ref_id');
            $table->string('site_name', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('references');
    }

}