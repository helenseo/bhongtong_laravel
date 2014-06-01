<?php

use Illuminate\Database\Migrations\Migration;

class CreatePromotionshavetagsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions_have_tags', function($table) {
            $table->increments('promotions_tags_id');
            $table->integer('promotion_id')->index();
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
        Schema::drop('promotions_have_tags');
    }

}