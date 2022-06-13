<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('receipt_id')->unsigned();
            $table->bigInteger('book_detail_id')->unsigned();
            $table->bigInteger('amount');
            $table->decimal('unit', 10, 2);
            $table->timestamps();

            $table->foreign('receipt_id')->references('id')->on('receipts');
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
        Schema::dropIfExists('receipt_details');
    }
}
