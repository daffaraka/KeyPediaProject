<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->unsignedBigInteger('id_product');
            $table->decimal('harga_product',20,2);
            $table->unsignedBigInteger('id_cart');
            $table->integer('quantity');
            $table->decimal('harga_total');
            $table->string('status_transaksi');

            
            $table->softDeletes();
            $table->timestamps();

           
        });

        Schema::table('transaksis', function (Blueprint $table ){
            $table->foreign('id_product')->references('product_id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_cart')->references('cart_id')->on('carts')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
