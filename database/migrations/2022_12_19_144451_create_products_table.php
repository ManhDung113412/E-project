<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('ID');
            $table->string('Name');
            $table->text('IMG');
            $table->string('Code');
            $table->unsignedBigInteger('Category_ID');
            $table->unsignedBigInteger('Brand_ID');
            $table->string('Slug');
            $table->timestamps();

            $table->foreign('Category_ID')
                ->references('ID')->on('categories')
                ->cascadeOnDelete();
            $table->foreign('Brand_ID')
                ->references('ID')->on('brands')
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
        Schema::dropIfExists('products');
    }
}
