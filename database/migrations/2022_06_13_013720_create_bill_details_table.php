<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bill_id')->unsigned();
            $table->bigInteger('book_detail_id')->unsigned();
            $table->integer('amount');
            $table->decimal('deposit', 10, 2);
            $table->timestamps();

            $table->foreign('bill_id')->references('id')->on('bills');
            $table->foreign('book_detail_id')->references('id')->on('book_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_details');
    }
}
