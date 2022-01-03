<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('total');
            $table->integer('quantity');
            $table->integer('id_foodstuffs');
            $table->integer('id_partner');
            $table->string('transaction_status',10)->comment('unpaid,process,shipping,success');
            $table->dateTime('transaction_date');
            $table->string('resi_code');
            $table->string('payment_method');
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
        Schema::dropIfExists('transactions');
    }
}
