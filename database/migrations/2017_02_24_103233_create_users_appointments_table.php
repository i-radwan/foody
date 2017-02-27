<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('appointment_id')->unsigned();
            $table->enum('status', config('constants.APPOINTMENT_STATUS'));
            $table->timestamps();

            $table->primary(['user_id', 'appointment_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('appointment_id')->references('id')->on('appointments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_appointments');
    }
}
