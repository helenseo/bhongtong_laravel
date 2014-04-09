<?php

use Illuminate\Database\Migrations\Migration;

class CreateEnterprisesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises', function($table) {
            $table->increments('ent_id');
            $table->string('ent_name', 255)->nullable();
            $table->integer('user_id')->index();
            $table->integer('enterprise_type_id')->index();
            $table->dateTime('registed_date')->nullable();
            $table->boolean('is_banned')->nullable();
            $table->boolean('is_approved')->nullable();
            $table->integer('setting_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('enterprises');
    }

}