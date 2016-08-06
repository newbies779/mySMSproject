<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_list_items', function (Blueprint $table) {
            $table->increments('id');

            $table->date('rent_date');
            $table->date('rent_req_date');
            $table->date('rent_approve_date')->nullable();

            $table->date('return_date')->nullable();
            $table->date('return_req_date')->nullable();
            $table->date('return_approve_date')->nullable();

            $table->string('rent_status');
            $table->string('return_status')->nullable();

            $table->string('rent_req_note')->nullable();
            $table->string('return_req_note')->nullable();

            //foreign keys
            $table->integer('user_id')->unsigned();
            $table->integer('item_id')->unsigned();

            $table->timestamps();
            
        });

        Schema::table('rent_list_items', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rent_list_items');
    }
}
