<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->char('userRef',50)->unique();
            $table->char('profit',50)->default(0);
            $table->char('balance',50)->default(0);
            $table->char('withdrawals',50)->default(0);
            $table->char('refBal',50)->default(0);
            $table->char('registrationIp',50)->nullable();
            $table->char('phone',50);
            $table->char('country',100)->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->char('photo',150)->nullable();
            $table->integer('canWithdraw')->default(1);
            $table->integer('canCompound')->default(2);
            $table->integer('status')->default(1);
            $table->integer('referral')->nullable();
            $table->char('refBonus',50)->nullable();
            $table->string('accountPin')->nullable();
            $table->integer('twoWay')->default(2);
            $table->integer('is_admin')->default(2);
            $table->integer('twoWayPassed')->default(2);
            $table->integer('emailVerified')->default(2);
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
