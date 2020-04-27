<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('reservation_id');
            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->string('mode');
            $table->string('currency');
            $table->double("split_supplier");
            $table->double("split_admin");
            $table->double('amount');
            $table->string('poll_url');
            $table->string('status')->default('pending');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
