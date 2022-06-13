<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompensationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compensation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('compensation_id')->unsigned()->comment('Mã hóa đơn đề bù');
            $table->unsignedBigInteger('book_detail_id')->comment('Mã chi tiết sách');
            $table->unsignedBigInteger('book_id')->comment('Mã sách');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('compensation_id')->references('id')->on('compensation');
            $table->foreign('book_detail_id')->references('id')->on('book_details');
            $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compensation_details');
    }
}
