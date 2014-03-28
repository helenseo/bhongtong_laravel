<?php

use Illuminate\Database\Migrations\Migration;

class CreateSaletypesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_types', function($table) {
            $table->increments('sale_type_id');
            $table->string('sale_type_detail', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sale_types');
    }

}