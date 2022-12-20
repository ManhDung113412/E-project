<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_collections', function (Blueprint $table) {
            $table->id('ID');
            $table->text('Before_Hover_IMG');
            $table->text('After_Hover_IMG');
            $table->text('IMG');
            $table->string('Title');
            $table->unsignedBigInteger('Brand_ID');
            $table->timestamps();

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
        Schema::dropIfExists('brand_collections');
    }
}
