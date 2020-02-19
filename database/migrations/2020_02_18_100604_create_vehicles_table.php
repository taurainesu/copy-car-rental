<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand');
            $table->string('model');
            $table->string('location');
            $table->string('vehicle_registration');
            $table->string('condition');
            $table->text('description');
            $table->dateTime('year');
            $table->string('cordinates')->nullable();
            $table->integer('milage');
            $table->string('type');
            $table->string('imageUrl')->nullable();
            $table->string('fuel_type');
            $table->decimal('engine_capacity');
            $table->string('color');
            $table->decimal('daily_rate');
            $table->integer('seats');
            $table->string('transmission');
            $table->boolean('done')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
