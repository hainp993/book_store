<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_bill_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('delivery_bill_id')->unsigned();
            $table->bigInteger('book_detail_id')->unsigned();
            $table->bigInteger('amount');
            $table->decimal('unit', 10, 2);
            $table->timestamps();

            $table->foreign('delivery_bill_id')->references('id')->on('delivery_bills');
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
        Schema::dropIfExists('delivery_bill_details');
    }
}
