<?php

use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function($table) {
            $table->increments('promotion_id');
            $table->string('promotion_detail', 45)->nullable();
            $table->dateTime('started_date')->nullable();
            $table->dateTime('ended_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('promotions');
    }

}