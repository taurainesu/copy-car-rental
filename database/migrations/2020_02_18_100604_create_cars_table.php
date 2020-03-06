<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
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
            $table->string('brand');
            $table->string('model');
            $table->string('location');
            $table->string('vehicle_registration');
            $table->string('physical_address');
            $table->text('description');
            $table->dateTime('year');
            $table->string('cordinates')->nullable();
            $table->integer('milage');
            $table->string('type');
            $table->integer('user_id');
            $table->string('imageUrl')->nullable();
            $table->string('imageUrl1')->nullable();
            $table->string('imageUrl2')->nullable();
            $table->string('imageUrl3')->nullable();
            $table->string('imageUrl4')->nullable();
            $table->string('fuel_type');
            $table->decimal('engine_capacity');
            $table->string('color');
            $table->decimal('daily_rate');
            $table->integer('seats');
            $table->string('transmission');
            $table->boolean('done')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}