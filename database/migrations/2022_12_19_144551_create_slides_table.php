<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliedes', function (Blueprint $table) {
            $table->id('ID');
            $table->boolean('Is_Top_Slide')->default(0);
            $table->boolean('Is_Middle_Slide')->default(0);
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
        Schema::dropIfExists('sliedes');
    }
}
