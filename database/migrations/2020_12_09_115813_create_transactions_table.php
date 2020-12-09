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
            $table->string('title');
            $table->bigInteger('user_id');
            $table->enum('type',['0','1','2'])->comment('0=>شارژ کیف پول 1=>برداشت از کیف پول 2=>لغو سفارش');
            $table->string('price');
            $table->string('tracking_code')->comment('کد رهگیری');
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
