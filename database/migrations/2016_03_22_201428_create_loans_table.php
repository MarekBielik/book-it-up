<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('from');
            $table->date('due_to');
            $table->unsignedSmallInteger('renewals');
            $table->boolean('isActive');
            //reference to books
            $table->integer('book_id')->unsigned();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            //reference to customers
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            //reference to librarians
            $table->integer('librarian_id')->unsigned()->nullable();
            $table->foreign('librarian_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('loans');
    }
}
