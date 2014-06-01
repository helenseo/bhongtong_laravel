<?php

use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function($table) {
            $table->increments('package_id');
            $table->string('package_name', 100)->nullable();
            $table->text('package_detail')->nullable();
            $table->decimal('rate', 10, 2)->nullable();
            $table->integer('charge_period_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('packages');
    }

}