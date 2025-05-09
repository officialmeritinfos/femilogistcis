<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->char('name',150);
            $table->char('email',150);
            $table->char('phone',150);
            $table->string('address');
            $table->integer('notification')->default(1);
            $table->integer('emailVerification')->default(2);
            $table->integer('twoFactor')->default(1);
            $table->integer('registration')->default(1);
            $table->integer('withdrawal')->default(1);
            $table->integer('compounding')->default(2);
            $table->integer('paymentMethod')->default(2);
            $table->char('codeExpiration',50)->default('24 Hours');
            $table->char('minDeposit',50)->default('50');
            $table->char('refBonus')->nullable();
            $table->string('logo');
            $table->string('favicon');
            $table->char('currency',30);
            $table->char('currencySign',30);
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
        Schema::dropIfExists('general_settings');
    }
}
