<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInactiveAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inactive_appointment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doctor_nmc');
            $table->bigInteger('hospital_id');
            $table->bigInteger('user_id');
            $table->longText('user_name');
            $table->string('time');
            $table->longText('doctor_name');
            $table->longText('doctor_photo');
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
        Schema::dropIfExists('inactive_appointment');
    }
}
