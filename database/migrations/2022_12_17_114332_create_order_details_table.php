<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->string('status');
            $table->decimal('receving', 15,2);
            $table->string('location');
            $table->string('code');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_detail_id');
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('code_id');
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')->on('users')
                ->cascadeOnDelete();
            $table->foreign('product_detail_id')
                ->references('id')->on('product_details')
                ->cascadeOnDelete();
            $table->foreign('shop_id')
                ->references('id')->on('shops')
                ->cascadeOnDelete();
            $table->foreign('payment_id')
                ->references('id')->on('payments')
                ->cascadeOnDelete();
            $table->foreign('code_id')
                ->references('id')->on('codes')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
