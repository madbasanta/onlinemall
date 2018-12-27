<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasalCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasal_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pasal_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('pasal_id')->references('id')->on('pasals');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('pasal_categories');
    }
}
