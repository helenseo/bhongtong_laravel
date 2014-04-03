<?php

use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function($table) {
            $table->increments('review_id');
            $table->longtext('review_description')->nullable();
            $table->string('review_title', 100)->nullable();
            $table->integer('user_id')->index();
            $table->integer('shop_id')->nullable()->index();
            $table->integer('product_id')->nullable()->index();
            $table->integer('cf_list_id')->nullable()->index();
            $table->string('rating', 45)->nullable();
            $table->string('likes', 45)->nullable();
            $table->dateTime('added_date')->nullable();
            $table->dateTime('updated_date')->nullable();
            $table->dateTime('removed_date')->nullable();
            $table->boolean('is_banned')->nullable();
            $table->boolean('is_approved')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reviews');
    }

}