<?php

use Illuminate\Database\Migrations\Migration;

class CreateChargeperiodsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge_periods', function($table) {
            $table->increments('charge_period_id');
            $table->string('charge_periodcol_name', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('charge_periods');
    }

}