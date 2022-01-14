<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('transaction_id');
            $table->unsignedBigInteger('product_id');
            $table->string('product_name');
            $table->integer('product_price');
            $table->unsignedBigInteger('cart_id');
            $table->string('product_image');
            $table->integer('quantity');
            $table->integer('transaction_total');
            $table->string('transaction_status');

            
            $table->softDeletes();
            $table->timestamps();

           
        });

        Schema::table('transactions', function (Blueprint $table ){
            $table->foreign('product_id')->references('product_id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cart_id')->references('cart_id')->on('carts')->onUpdate('cascade')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
