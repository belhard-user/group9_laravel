<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
        });

        Schema::create('car_category', function (Blueprint $table) {
            $table->integer('car_id');
            $table->integer('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('cars');
        Schema::dropIfExists('car_category');
    }
}
