<?php

use Illuminate\Database\Migrations\Migration;

class CreateEnterprisehavetagsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprise_have_tags', function($table) {
            $table->increments('enterprise_tags_id');
            $table->integer('enterprises_id')->index();
            $table->integer('tag_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('enterprise_have_tags');
    }

}