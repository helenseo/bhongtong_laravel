<?php

use Illuminate\Database\Migrations\Migration;

class CreateSocialslistTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials_list', function($table) {
            $table->increments('social_id');
            $table->string('social_name', 100)->nullable();
            $table->text('social_detail')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('socials_list');
    }

}