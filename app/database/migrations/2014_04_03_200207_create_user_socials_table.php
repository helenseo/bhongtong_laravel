<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersocialsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_socials', function($table) {
            $table->increments('user_social_id');
            $table->integer('user_id')->index();
            $table->integer('social_list_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_socials');
    }

}