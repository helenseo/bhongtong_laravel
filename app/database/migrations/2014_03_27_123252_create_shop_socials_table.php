<?php

use Illuminate\Database\Migrations\Migration;

class CreateShopsocialsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_socials', function($table) {
            $table->increments('shop_social_id');
            $table->integer('shop_id');
            $table->integer('social_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shop_socials');
    }

}