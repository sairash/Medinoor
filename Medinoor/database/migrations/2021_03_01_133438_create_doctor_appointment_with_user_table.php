<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorAppointmentWithUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_appointment_with_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doctor_nmc');
            $table->bigInteger('hospital_id');
            $table->bigInteger('amount_of_patient');
            $table->bigInteger('appointments');
            $table->timestamp('appointment_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_appointment_with_user');
    }
}
