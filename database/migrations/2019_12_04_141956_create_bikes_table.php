<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('rpm');
            $table->mediumText('slug');
            $table->longText('description');
            $table->double('price')->nullable();
            $table->string('path')->nullable();
            $table->unsignedBigInteger('bike_category')->nullable();
            $table->foreign('bike_category')->references('id')->on('bike_categories');
            $table->integer('year');
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
        Schema::dropIfExists('bikes');
    }
}
