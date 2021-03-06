<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function(Blueprint $table) {
            $table->boolean('shipped')->default(0)->after('type');
        });
        Schema::create('order_inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('inventory_id');
            $table->integer('quantity');
            $table->double('price');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('inventory_id')->references('id')->on('inventories');

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
        
        Schema::table('orders', function(Blueprint $table) {
            $table->dropColumn('shipped');
        });
        Schema::dropIfExists('order_inventory');
    }
}
