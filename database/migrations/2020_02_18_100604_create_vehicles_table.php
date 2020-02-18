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
            $table->string("brand")->nullable();
            $table->string("type")->nullable();
            $table->string("model")->nullable();
            $table->integer("milage")->nullable();
            $table->string("plateNo")->nullable();
            $table->string("fuelType")->nullable();
            $table->string("seats")->nullable();
            $table->string("engineCapacity")->nullable();
            $table->decimal("dailyRate")->nullable();
            $table->string("color")->nullable();
            $table->string("location")->nullable();
            $table->bigIncrements('id');
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
