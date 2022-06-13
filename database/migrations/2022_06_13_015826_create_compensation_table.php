<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompensationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compensation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bill_detail_id')->unsigned();
            $table->decimal('total', 10, 2);
            $table->string('type');
            $table->timestamps();

            $table->foreign('bill_detail_id')->references('id')->on('bill_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compensation');
    }
}
