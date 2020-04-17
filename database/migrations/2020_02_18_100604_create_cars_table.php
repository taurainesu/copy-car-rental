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
            $table->string('engine_number');
            $table->string('chasis_number');
            $table->string('account_number');
            $table->string('account_type');
            $table->string('bank');
            $table->string('branch');
            $table->string('account_name');
            $table->string('location');
            $table->string('vehicle_registration')->unique();
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
            $table->string('imageUrl5')->nullable();
            $table->string('imageUrl6')->nullable();
            $table->string('imageUrl7')->nullable();
         

            $table->string('fuel_type');
            $table->decimal('engine_capacity');
            $table->string('color');
            $table->decimal('daily_rate')->default(5);
            $table->integer('seats');
            $table->string('transmission');
            $table->boolean('done')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
             /**
                 *show the status of the view.
                 *pending (default state) 
                 *show
                 *hide
             */
            $table->string('status')->default("pending");;
            $table->softDeletes('deleted_at');
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
