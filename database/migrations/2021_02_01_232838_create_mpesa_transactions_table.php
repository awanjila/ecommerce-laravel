<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpesaTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transactionType')->default('pay');
            $table->string('transID')->default('pay');
            $table->string('transTime')->default('pay');
            $table->decimal('transAmount', 8,2)->default(200);
            $table->string('BusinessShortCode')->default('pay');
            $table->string('billRefNumber')->default('pay');
            $table->string('invoiceNumber')->default('pay');
            $table->decimal('orgAccountBalance', 8,2)->default(200);
            $table->string('thirdPartyTransID')->default('pay');
            $table->string('MSISDN')->default('pay');
            $table->string('firstName')->default('Abraham');
            $table->string('middleName')->default('Wanjila');
            $table->string('lastName')->default('Muchika');
            $table->text('response')->default('response');

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
        Schema::dropIfExists('mpesa_transactions');
    }
}
