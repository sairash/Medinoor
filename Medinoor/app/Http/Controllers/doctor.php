<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class doctor extends Controller
{
	public function returnRegisterView()
	{
		return view('hospital.registerDoctor');
	}
    public function registerHospital()
    {
    	
    }

     public function fake()
    {
    	function randw($length=10){
	        return substr(str_shuffle("qwertyuiopasdfghjklzxcvbnm"),0,$length);
	    }

	    function randn($length=5){
	        return substr(str_shuffle("12345634517261741654917254123"),0,$length);
	    }

        $doctor = \Request::query('nmc') ?? null;
        if ($doctor != null) {
            $array = array('name' =>  randw(),'NMC' => $doctor, 'Photo' => 'https://external-preview.redd.it/fxEPLB6CitiRWGkahRytFWrSd4mypXuIBiFCg8K5pWk.png?auto=webp&s=452bc0538c4081bd58bb92e8a6562a2ea9a0310f', 'speciality' => 'Skin', 'Degree' => 'MD');
        }else{
            $array = array('name' =>  randw(),'NMC' => randn(), 'Photo' => 'https://external-preview.redd.it/fxEPLB6CitiRWGkahRytFWrSd4mypXuIBiFCg8K5pWk.png?auto=webp&s=452bc0538c4081bd58bb92e8a6562a2ea9a0310f', 'speciality' => 'Skin', 'Degree' => 'MD');
        }
	    
        DB::table('doctor')->insert($array);
    }

    public function nmcRequest()
    {
    	$doctor = strtoupper(\Request::query('nmc')) ?? null;
        $doctorToSend = json_decode(  DB::table('doctor')->where('nmc', 'LIKE', "%{$doctor}%")->take(3)->get());
        return response()->json($doctorToSend,200);
    }

    public function registerRequest(Request $request)
    {
        $nmc = $request->nmc;
    	$name = $request->name;
        $degree = $request->degree;
        $photo = $request->photo;
        $speciality = $request->speciality;

    	$data_to_enter_to_database=['NMC' => $nmc,'Name' => $name, 'Photo' => $photo, 'Degree' => $degree, 'speciality' => $speciality];
    	DB::table('doctor')->insert($data_to_enter_to_database);
        
    }


    public function worksInHospital(Request $request){
        $contains_doctor_data = $request->hasData;
        $doctor = $request->nmc;
        $hospital = $request->hospital;
        $sunday = $request->sunday;
        $monday = $request->monday;
        $tuesday = $request->tuesday;
        $wednesday = $request->wednesday;
        $thursday = $request->thursday;
        $friday = $request->friday;
        $saturday =  $request->saturday;
        $hospital_logo =  $request->hospital_logo;
        $hospital_name =  $request->hospital_name;
        $hospital_website =  $request->hospital_website;
        $hospital_totalRating =  $request->hospital_totalRating;
        $hospital_info =  $request->hospital_info;
        $hospital_typeOfHospital =  $request->hospital_typeOfHospital;
        $price =  $request->price;
        $perday =  $request->perday;

        $name = $request->name;
        $degree = $request->degree;
        $photo = $request->photo;
        $speciality = $request->speciality;
        if ($contains_doctor_data != 'yes') {
            $get_Data_of_doctor = DB::table('doctor')->where('nmc', $doctor)->get();
            $name = $get_Data_of_doctor[0]->Name;
            $degree = $get_Data_of_doctor[0]->Degree;
            $photo = $get_Data_of_doctor[0]->Photo;
            $speciality = $get_Data_of_doctor[0]->Speciality;
        }

        $data_to_enter_in_hospital_doctor_database = array('hospital_id' => $hospital,'doctor_nmc' => $doctor, 'sunday' => $sunday, 'monday' => $monday, 'tuesday' => $tuesday, 'wednesday' => $wednesday, 'thursday' => $thursday, 'friday' => $friday, 'saturday' => $saturday,'doctor_name'=>$name,'doctor_degree'=>$degree,'doctor_photo'=>$photo,'doctor_speciality'=>$speciality,'hospital_typeOfHospital'=>$hospital_typeOfHospital,'hospital_logo'=>$hospital_logo,'hospital_name'=>$hospital_name,'hospital_website'=>$hospital_website,'hospital_totalRating'=>$hospital_totalRating,'hospital_info'=>$hospital_info,'price'=>$price,'total_appointment_per_day'=>$perday);
        DB::table('doctors_in_hospital')->insert($data_to_enter_in_hospital_doctor_database);
    }

    public function doctorsInHospitalLatest($id){
        $doctorToSend = json_decode(  DB::table('doctors_in_hospital')->where('hospital_id', $id)->take(3)->get());
        return response()->json($doctorToSend,200);
    }

    
}
