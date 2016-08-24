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
            $table->string('location');
            $table->string('note');
            $table->date('bought_year');
            $table->timestamp('reviewed_at')->nullable();

            //foreign key
            $table->integer('category_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('items', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
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
