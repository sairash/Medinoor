<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsInHospitalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors_in_hospital', function (Blueprint $table) {
            $table->id();
            $table->string('hospital_id');
            $table->longText('hospital_logo');
            $table->longText('hospital_name');
            $table->longText('hospital_website');
            $table->longText('hospital_totalRating');
            $table->longText('hospital_info');
            $table->longText('hospital_typeOfHospital');
            $table->string('doctor_nmc');
            $table->string('sunday')->nullable();
            $table->string('monday')->nullable();
            $table->string('tuesday')->nullable();
            $table->string('wednesday')->nullable();
            $table->string('thursday')->nullable();
            $table->string('friday')->nullable();
            $table->string('saturday')->nullable();
            $table->string('doctor_name');
            $table->string('doctor_photo');
            $table->string('doctor_degree');
            $table->string('doctor_speciality');
            $table->bigInteger('price');
            $table->bigInteger('total_appointment_per_day');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors_in_hospital');
    }
}
