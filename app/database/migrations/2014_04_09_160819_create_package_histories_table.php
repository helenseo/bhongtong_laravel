<?php

use Illuminate\Database\Migrations\Migration;

class CreatePackagehistoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_histories', function($table) {
            $table->increments('package_history_id');
            $table->integer('shop_id')->index();
            $table->dateTime('started_date')->nullable();
            $table->dateTime('ended_date')->nullable();
            $table->integer('package_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('package_histories');
    }

}