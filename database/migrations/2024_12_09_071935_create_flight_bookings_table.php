<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('trip_type');
            $table->date('departure_date');
            $table->date('return_date')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('departure_country');
            $table->string('destination_country');
            $table->string('nationality');
            $table->string('class');
            $table->integer('number_of_adults');
            $table->integer('number_of_children');
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
        Schema::dropIfExists('flight_bookings');
    }
}
