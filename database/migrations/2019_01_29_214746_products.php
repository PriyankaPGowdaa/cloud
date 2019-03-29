<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cid')->nullable();
            $table->string('categoryName')->nullable();
            $table->string('name')->nullable();
            $table->string('color')->nullable();
            $table->string('brand')->nullable();
            $table->string('price')->nullable();
            $table->string('productImage')->nullable();
            $table->string('promotion')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('products');
    }
}

