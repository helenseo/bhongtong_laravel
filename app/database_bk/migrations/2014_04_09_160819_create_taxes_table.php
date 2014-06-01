<?php

use Illuminate\Database\Migrations\Migration;

class CreateTaxesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function($table) {
            $table->increments('tax_id');
            $table->string('tax_name', 50)->nullable();
            $table->string('tax_rate', 50)->nullable();
            $table->dateTime('added_date')->nullable();
            $table->dateTime('remoced_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('taxes');
    }

}