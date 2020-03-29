<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('pick_up_date');
            $table->dateTime('return_date');
            /**
                 *show the status of the reservation.
                 *pending (paynow_object_created succesfully and waiting for pollin)
                 *active (reservation has been paid for)
                 *canceled_by_user
                 *canceled_by_owner
             */
            $table->string('payment_status')->default("pending");
            $table->integer('user_id');
            $table->integer('car_id');
            $table->decimal('daily_rate');
            $table->decimal('total_cost')->nullable();
            /**
                 *show the status of the reservation.
                 *pending (default state)
                 *active 
                 *canceled_by_user
                 *canceled_by_owner
             */
            $table->string('reservation_status')->default("pending");
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps('date_added');
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
        Schema::dropIfExists('reservations');
    }
}
