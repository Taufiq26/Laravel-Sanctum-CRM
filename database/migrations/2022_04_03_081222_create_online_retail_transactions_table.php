<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineRetailTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_retail_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('inv_code');
            $table->string('stock_code');
            $table->text('description');
            $table->integer('qty');
            $table->dateTime('inv_date');
            $table->float('price');
            $table->integer('customer_id');
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('online_retail_transactions');
    }
}
