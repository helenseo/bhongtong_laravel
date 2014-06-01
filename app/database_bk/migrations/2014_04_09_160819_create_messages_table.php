<?php

use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function($table) {
            $table->increments('message_id');
            $table->integer('user_id')->index();
            $table->integer('added_date')->nullable();
            $table->integer('edited_date')->nullable();
            $table->text('subject')->nullable();
            $table->text('description')->nullable();
            $table->integer('shop_id')->nullable()->index();
            $table->integer('sale_id')->nullable()->index();
            $table->integer('admin_id')->nullable()->index();
            $table->integer('order_id')->nullable()->index();
            $table->integer('ticket_id')->nullable()->index();
            $table->integer('product_id')->nullable()->index();
            $table->integer('parent_message_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('messages');
    }

}