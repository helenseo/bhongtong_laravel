<?php

use Illuminate\Database\Migrations\Migration;

class CreateShoptypesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_types', function($table) {
            $table->increments('shop_type_id');
            $table->string('shop_type_name', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shop_types');
    }

}