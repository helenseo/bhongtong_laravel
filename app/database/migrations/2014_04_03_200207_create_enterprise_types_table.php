<?php

use Illuminate\Database\Migrations\Migration;

class CreateEnterprisetypesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprise_types', function($table) {
            $table->increments('ent_type_id');
            $table->string('ent_type_name', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('enterprise_types');
    }

}