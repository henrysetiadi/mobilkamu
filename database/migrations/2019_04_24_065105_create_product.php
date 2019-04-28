<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand')->length(191);
            $table->string('model')->length(191);
            $table->string('fuel')->length(191);
            $table->float('price');
            $table->float('length');
            $table->float('width');
            $table->float('height');
            $table->string('fileToUpload')->length(191);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('product_table');
    }
}
