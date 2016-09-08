<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_id');
            $table->string('custom_id');
            $table->string('name');
            $table->string('status');
            $table->string('location')->nullable();
            $table->integer('assignee_id')->unsigned()->nullable();
            $table->string('note')->nullable();
            $table->date('bought_year')->nullable();
            $table->timestamp('reviewed_at')->nullable();

            //foreign key
            $table->integer('category_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('items', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('assignee_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
