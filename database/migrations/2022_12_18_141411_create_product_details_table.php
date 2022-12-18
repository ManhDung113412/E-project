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
            $table->id();
            $table->decimal('import_price', 15, 2);
            $table->decimal('export_price', 15, 2);
            $table->decimal('sale_price', 15, 2)->nullable();
            $table->text('main_img');
            $table->text('slide_img_1');
            $table->text('slide_img_2');
            $table->text('information');
            $table->string('material');
            $table->string('color');
            $table->string('size');
            $table->string('code');
            $table->integer('quantity');
            $table->boolean('is_trending')->default(0);
            $table->boolean('is_new_arrivals')->default(0);
            $table->boolean('is_feature')->default(0);
            $table->unsignedBigInteger('product_id');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')->on('products')
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
