<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hire', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('actual_pick_up_date');
            $table->date('actual_return_date');
            $table->string('comment');
            $table->float('review');
            $table->float('payment_status');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hire');
    }
}
