<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('sender_name');
            $table->string('sender_address')->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('receiver_name');
            $table->string('receiver_address')->nullable();
            $table->string('receiver_phone')->nullable();
            $table->string('receiver_email')->nullable();
            $table->string('origin');
            $table->string('destination');
            $table->string('photo')->nullable();
            $table->string('service');
            $table->text('package_description');
            $table->decimal('package_fee', 10, 2)->nullable();
            $table->decimal('total_weight', 8, 2)->nullable();
            $table->date('shipment_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('shipment_mode')->nullable();
            $table->string('tracking_number')->unique()->nullable();
            $table->enum('status', ['pending', 'in-transit', 'delivered', 'cancelled','on-hold'])->default('pending');
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
        Schema::dropIfExists('deliveries');
    }
}
