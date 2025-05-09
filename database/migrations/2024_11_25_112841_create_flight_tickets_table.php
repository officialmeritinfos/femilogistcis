<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_tickets', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('pnr')->unique(); // Unique PNR code
            $table->string('flight_number'); // Flight number
            $table->string('airline_number'); // Airline number
            $table->string('departure_airport'); // Departure airport
            $table->string('arrival_airport'); // Arrival airport
            $table->dateTime('departure_time'); // Departure time
            $table->dateTime('arrival_time'); // Arrival time
            $table->string('passenger_name'); // Passenger's full name
            $table->string('passenger_email'); // Passenger's email
            $table->string('passenger_phone')->nullable(); // Passenger's phone number
            $table->string('seat_number')->nullable(); // Seat number
            $table->string('gate_number')->nullable(); // Gate number
            $table->enum('class', ['economy', 'business', 'first'])->default('economy'); // Ticket class
            $table->decimal('ticket_price', 10, 2); // Ticket price
            $table->enum('flight_status', ['open', 'closed', 'delayed', 'cancelled'])->default('open'); // Flight status
            $table->enum('status', ['booked', 'cancelled', 'completed'])->default('booked'); // Ticket status
            $table->timestamps(); // Created and updated timestamps
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_tickets');
    }
}
