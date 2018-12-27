<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('old_price');
            $table->integer('discount_id')->unsigned()->nullable();
            $table->integer('currency_id')->unsigned()->nullable();
            $table->integer('size_id')->unsigned()->nullable();
            $table->integer('color_id')->unsigned()->nullable();
            $table->integer('brand_id')->unsigned()->nullable();  
            $table->integer('pasal_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('discount_id')->references('id')->on('discounts');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('pasal_id')->references('id')->on('pasals');
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
        Schema::dropIfExists('inventories');
    }
}
