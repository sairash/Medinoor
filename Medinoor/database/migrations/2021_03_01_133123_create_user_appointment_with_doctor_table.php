<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAppointmentWithDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_appointment_with_doctor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doctor_nmc');
            $table->bigInteger('hospital_id');
            $table->longText('hospital_name');
            $table->bigInteger('user_id');
            $table->string('time');
            $table->longText('doctor_name');
            $table->longText('doctor_photo');
            $table->boolean('approved');
            $table->longText('reason');
            $table->timestamp('appointment_date');
            $table->string('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_appointment_with_doctor');
    }
}
