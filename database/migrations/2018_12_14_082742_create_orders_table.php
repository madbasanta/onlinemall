<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('inventory_id')->unsigned()->nullable();
             $table->integer('quantity')->nullable();
             $table->integer('current_price')->nullable();
             $table->integer('currency_id')->unsigned()->nullable();
            $table->boolean('is_active')->nullable();
            $table->foreign('inventory_id')->references('id')->on('inventories');
             $table->foreign('currency_id')->references('id')->on('currencies');
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
        Schema::dropIfExists('orders');
    }
}
