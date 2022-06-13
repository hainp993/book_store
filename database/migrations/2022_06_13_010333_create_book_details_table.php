<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('book_id')->unsigned();
            $table->bigInteger('publisher_id')->unsigned();
            $table->string('name');
            $table->dateTime('year_publishing');
            $table->decimal('price', 10, 2);
            $table->decimal('rent_cost', 10, 2);
            $table->integer('page');
            $table->string('isbm_code');
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('publisher_id')->references('id')->on('publishers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_details');
    }
}
