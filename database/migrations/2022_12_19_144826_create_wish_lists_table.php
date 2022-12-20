<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wish_list', function (Blueprint $table) {
            $table->id('ID');
            $table->unsignedBigInteger('Customer_ID');
            $table->unsignedBigInteger('Product_Detail_ID');
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
        Schema::dropIfExists('wish_list');
    }
}
