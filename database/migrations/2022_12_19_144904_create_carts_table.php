<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id('ID');
            $table->unsignedBigInteger('Customer_ID');
            $table->unsignedBigInteger('Product_Detail_ID');
            $table->integer('Quantity');
            $table->timestamps();

            $table->foreign('Customer_ID')
                ->references('ID')->on('users')
                ->cascadeOnDelete();
            $table->foreign('Product_Detail_ID')
                ->references('ID')->on('product_details')
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
        Schema::dropIfExists('carts');
    }
}
