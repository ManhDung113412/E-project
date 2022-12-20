<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id('ID');
            $table->decimal('Import_Price', 15, 2);
            $table->decimal('Export_Price', 15, 2);
            $table->decimal('Sale_Price', 15, 2)->nullable();
            $table->text('Main_IMG');
            $table->text('Slide_IMG_1');
            $table->text('Slide_IMG_2');
            $table->text('Information');
            $table->string('Material');
            $table->string('Color');
            $table->string('Size');
            $table->string('Code');
            $table->integer('Quantity');
            $table->boolean('Is_Trending')->default(0);
            $table->boolean('Is_New_Arrivals')->default(0);
            $table->boolean('Is_Feature')->default(0);
            $table->unsignedBigInteger('Product_ID');
            $table->string('Slug');
            $table->timestamps();

            $table->foreign('Product_ID')
                ->references('ID')->on('products')
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
        Schema::dropIfExists('product_details');
    }
}
