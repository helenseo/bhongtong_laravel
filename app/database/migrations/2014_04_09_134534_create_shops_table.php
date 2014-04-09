<?php

use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function($table) {
            $table->increments('shop_id');
            $table->integer('shop_type_id')->index();
            $table->string('shop_name', 255)->nullable();
            $table->text('shop_detail')->nullable();
            $table->text('shop_address')->nullable();
            $table->integer('province_id')->index();
            $table->integer('ent_id')->nullable();
            $table->dateTime('started_date')->nullable();
            $table->dateTime('updated_date')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('views')->nullable();
            $table->integer('likes')->nullable();
            $table->boolean('is_classified')->nullable();
            $table->integer('deliver_id')->index();
            $table->dateTime('removed_date')->nullable();
            $table->boolean('is_banned')->nullable();
            $table->boolean('is_approved')->nullable();
            $table->integer('promotion_id')->index();
            $table->integer('shop_social_id')->index();
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
        Schema::drop('shops');
    }

}